
/**
 * Created by dramd on 12/29/2016.
 */
//setInterval(updateKanaban, 5000);

function updateKanaban(){
    $( "#todo" ).load( window.location.href + " #todo" );
    $( "#doing" ).load(window.location.href +  " #doing" );
    $( "#pending" ).load(window.location.href +  " #pending" );
    $( ".dropdown-menu"+".tasks-menu" ).load( window.location.href + ".dropdown-menu"+".tasks-menu" );

}


function sendToDoing(id) {
    var taskId = id;

    $.post('todo/sendToDoing', {taskId: taskId}, function () {
        var elem = document.getElementById('card-columns-' + taskId);
        elem.className += "animated fadeOutRight";
       updateKanaban();
        //elem.parentNode.removeChild(elem);
    });
}
function sendToPending(id) {
    var taskId = id;

    $.post('todo/sendToPending', {taskId: taskId}, function () {
        var elem = document.getElementById('card-columns-' + taskId);
        elem.className += "animated fadeOutRight";
        updateKanaban();

        //elem.parentNode.removeChild(elem);
    });
}
function sendToPending(id) {
    var taskId = id;

    $.post('tasks-response', function () {
        var elem = document.getElementById('card-columns-' + taskId);
        elem.className += "animated fadeOutRight";
        updateKanaban();

        //elem.parentNode.removeChild(elem);
    });
}
function sendToToDo(id) {
    var taskId = id;

    $.post('todo/sendToToDo', {taskId: taskId}, function () {
        var elem = document.getElementById('card-columns-' + taskId);
        elem.className += "animated fadeOutLeft";
       updateKanaban();

        //elem.parentNode.removeChild(elem);
    });
}

