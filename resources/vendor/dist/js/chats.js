//
//function loadChatbox(user2) {
//
//    var e = document.getElementById('chat' + user2);
//    var d = document.getElementById('chat-box'+user2);
//
//
//
//    e.style.display = "block";
//    d.style.display = "block";
//    e.className += " animated bounceInUp";
//    receiver = user2;
//    updateScroll();
//
//}
//



//this function can remove a array element.
Array.remove = function(array, from, to) {
    var rest = array.slice((to || from) + 1 || array.length);
    array.length = from < 0 ? array.length + from : from;
    return array.push.apply(array, rest);
};

//this variable represents the total number of popups can be displayed according to the viewport width
var total_popups = 0;

//arrays of popups ids
var popups = [];

//this is used to close a popup
function close_popup(id)
{
    clearTimeout(tout);
    for(var iii = 0; iii < popups.length; iii++)
    {
        if(id == popups[iii])
        {
            Array.remove(popups, iii);

            document.getElementById('chat'+id).style.display = "none";

            calculate_popups();

            return;
        }
    }
}

//displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
function display_popups()
{
    var right = 0;
    var iii = 0;
    for(iii; iii < total_popups; iii++)
    {
        if(popups[iii] != undefined)
        {
            var element = document.getElementById('chat'+popups[iii]);
            element.style.right = right + "px";
            right = right + 390;
            element.style.display = "block";
        }
    }

    for(var jjj = iii; jjj < popups.length; jjj++)
    {
        var element = document.getElementById('chat'+popups[jjj]);
        element.style.display = "none";
    }
    updateScroll();
}

//creates markup for a new popup. Adds the id to popups array.

function register_popup(id )
{
    console.log(id);
    pullData();
    //makeSeen();



    for(var iii = 0; iii < popups.length; iii++)
    {
        //already registered. Bring it to front.
        if(id == popups[iii])
        {
            Array.remove(popups, iii);

            popups.unshift(id);

            calculate_popups();


            return;
        }
    }
    receiver = id;
    var e = document.getElementById('chat' + id);
    e.style.display = "block";
    e.className += " animated bounceInUp";
    popups.unshift(id);

    calculate_popups();

}

//calculate the total number of popups suitable and then populate the toatal_popups variable.
function calculate_popups()
{
    var width = window.innerWidth;
    if(width < 540)
    {
        total_popups = 0;
    }
    else
    {
        width = width - 200;
        //320 is width of a single popup box
        total_popups = parseInt(width/320);
    }

    display_popups();

}

//recalculate when window is loaded and also when window is resized.
window.addEventListener("resize", calculate_popups);
window.addEventListener("load", calculate_popups);


function closeChatBox() {
    var e = document.getElementById('chat-box');
    e.style.display = "none";
}
var user1 = $('#user1').html();
var receiver;

var user1_name = $('#user1-name').html();
var user1_img = $('#user1-img').html();
var receiver_name = $('#receiver-name' + receiver).html();
var receiver_img = $('#receiver-img' + receiver).html();




function pullData() {
    retrieveChatMessages();

    retrieveTypingStatus();
    tout = setTimeout(pullData, 3000);
    return;
}
function updateScroll() {
    var element = document.getElementById("direct-chat-messages"+receiver);
    element.scrollTop = element.scrollHeight;
}

function retrieveChatMessages() {

    receiver_img = $('#receiver-img' + receiver).html();
    $.post('chat/retrieveChatMessages', {
        user1: user1,
        receiver: receiver,
        receiver_name: receiver_name,
        receiver_img: receiver_img
    }, function (data) {
        receiver_name = $('#receiver-name' + receiver).html();
        if (data.length > 0)
            $('#direct-chat-messages' + receiver).append(" <div class='direct-chat-msg left'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-left'>" + receiver_name + "</span><span class='direct-chat-timestamp pull-right'>23 Jan 2:00 pm</span></div>"
                + "<img class='direct-chat-img animated bounceIn' src='/pms/public/user_profile_pictures/" + receiver_img + "' alt='Message User Image'>"
                + "<div style='animation-delay: 0.05s;'class='direct-chat-text animated bounceInDown '>" + urlify(data) + "</div></div>");

    });


}

function makeSeen() {
    receiver_img = $('#receiver-img' + receiver).html();
    $.post('chat/makeSeen', {
        user1: user1,
        receiver: receiver,
        receiver_name: receiver_name,
        receiver_img: receiver_img
    });
}

function retrieveTypingStatus() {
    $.post('chat/retrieveTypingStatus', {user1: user1}, function (user1) {
        if (user1.length > 0)
            $('#typingStatus').html(user1 + ' is typing');
        else
            $('#typingStatus').html('');
    });
}
function isUrl(s) {
    var regexp = (/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/)
    return regexp.test(s);
}

function urlify(s) {
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return s.replace(urlRegex, function(url) {
        return( '<a style="color:black; text-decoration:underline;" target ="_blank" href="' + url + '">' + url + '</a>');
    })
    // or alternatively
    // return text.replace(urlRegex, '<a href="$1">$1</a>')
}

$(document).keyup(function (e) {
    if (e.keyCode == 13) {
        sendMessage();
    }
    else
        isTyping();

});

function sendMessage(id) {
    var data = $('#text' + id).val();
    if (data.length > 0) {
        $.post('chat/sendMessage', {
            data: data,
            user1: user1,
            receiver: id,
            user1_name: user1_name,
            user1_img: user1_img

        }, function () {
                $('#direct-chat-messages' + id).append("<div class='direct-chat-msg right'><div class='direct-chat-info clearfix'><span class='direct-chat-name pull-right'>" + user1_name + "</span>" +
                    "<span class='direct-chat-timestamp pull-left'>23 Jan 2:05 pm</span></div>"
                    + "<img class='direct-chat-img animated bounceIn' src='/pms/public/user_profile_pictures/" + user1_img + "' alt='Message User Image'>"
                    + "<div class='direct-chat-text animated bounceInLeft'>" + urlify(data) + "</div></div>");

            $('#text' + id).val('');
            updateScroll();
            notTyping();
        });
    }
}

function isTyping() {
    $.post('chat/isTyping', {user1: user1});
}

function notTyping() {
    $.post('chat/notTyping', {user1: user1});
}



