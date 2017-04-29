
$(document).keyup(function (e) {
    if (e.keyCode == 13) {
        saveToDo();
    }
});

function urlify(s) {
    var urlRegex = /(https?:\/\/[^\s]+)/g;
    return s.replace(urlRegex, function(url) {
        return( '<a style="color:black; text-decoration:underline;" target ="_blank" href="' + url + '">' + url + '</a>');
    })
    // or alternatively
    // return text.replace(urlRegex, '<a href="$1">$1</a>')
}
function saveToDo(id) {
    alert(id);
    var text = $('#todoText'+id).val();
    var user = $('#todo_user').html();
    var item = $('#todoItem').html;

    if (text.length > 0) {
        $.post('todo/saveTodo', {
            text: text,
            user:user
        }, function () {
            $('#todoList').append("<li><i class='fa fa-list-ul'></i><span class='text'>"+urlify(text)+"</span>" +
                "<small class='label label-danger'><i class='fa fa-clock-o'></i> just now</small>" +
                "<div class='pull-right'><i class='fa fa-edit'></i>" +
                "<i class='fa fa-trash-o text-red'></i></div></li>");

            $('#todoText').val('');

        });
    }
}

function deleteTodo(id){
    var todoId = id ;
    $.post('todo/deleteTodo',{ todoId :todoId},function(){
        var elem = document.getElementById('todoItem'+todoId);
        elem.className += "animated zoomOut";
        //elem.parentNode.removeChild(elem);
    });

}