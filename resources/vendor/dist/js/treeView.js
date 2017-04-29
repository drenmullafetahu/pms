/**
 * Created by dramd on 1/7/2017.
 */
//function update(){
//    document.getElementById( "right-Treeview" ).style.visibility="visible";
//}

function clickedTask(id) {
    $( "#insight-Treeview" ).load( window.location.href + " #insight-Treeview" );
    document.getElementById( "right-Treeview" ).style.visibility="visible";
    var taskId = id;
    alert(taskId); //Kur e hjek kto sbon
    $('html, body').animate({
        scrollTop: $("#Task_details").offset().top
    });

    $.get('task/getClicked', {taskId: taskId}, function (data) {

        data.forEach(function(element) {
            console.log(element);

            $('.widget-user-username').append(element.name + element.last_name);
            $('.widget-user-desc').append(element.task_title);
            $('').append('../public/user_profile_pictures/'+ element.img_src);
            var elem = document.getElementById('task_image').src ="../public/user_profile_pictures/"+ element.img_src;
            $('#dd_assigned_to').append(element.name + element.last_name);
            $('#dd_description').append(element.task_description);
            $('#dd_status_title').append(element.status_title);
            $('#dd_due_date').append(element.due_date);

        });

    });


}

