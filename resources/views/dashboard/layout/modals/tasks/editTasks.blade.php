<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;

$usersDetails = $tasksModel->getUsers();
$projectsDetails = $tasksModel->getProjects();
$prioritiesDetails = $tasksModel->getPriorities();
$statusesDetails = $tasksModel->getStatuses();
$users = [];
foreach ($usersDetails as $user) {
    $users[$user['user_id']] = $user['name'];
}
foreach ($projectsDetails as $project) {
    if (!empty($project)) {
        $projects[$project['id']] = $project['project_title'];
    }
}
foreach ($prioritiesDetails as $priority) {
    $priorities[$priority['id']] = $priority['priority_title'];
}
foreach ($statusesDetails as $status) {
    $statuses[$status['id']] = $status['status_title'];
}

?>
<div class="modal fade" id="edit-task-{{$task['id']}}" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> {!! Form::model($task, ['method'=>'PATCH', 'action' => ['TasksController@update', $task['id']]]) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading"><i class="fa fa-edit fa-2x text-aqua margin-r-4"></i>
                    Edit -
                    <small>{{$task['task_title']}}</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{$task['task_title']}}" name="task_title"
                           placeholder="">
                </div>
                <div class="form-group">
                    <label>Project Title</label>
                    {!! Form::select('project_id', $projects , $project['id'] , ['class' => 'form-control select2','style'=>'width:100%']) !!}
                </div>
                <div class="form-group">
                    <label>Assigned To</label>
                    {!! Form::select('assigned_to', $users,$user['user_id'] , ['class' => 'form-control select2','style'=>'width:100%']) !!}
                </div>
                <!-- Date -->
                <div class="form-group">
                    <label>Date:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="due_date" class="form-control pull-right"
                               value="{{$task['due_date']}}">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                    <label>Select Priority</label>
                    {!! Form::select('priority_id', $priorities , $priority['id'] , ['class' => 'form-control select2','style'=>'width:100%']) !!}
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="textarea" name="task_description"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$task['task_description']}}</textarea>
                </div>
                {{--{!! Form::hidden('modified_by', $user ) !!}--}}
                {!! Form::hidden('modified_by', Auth::user()->id) !!}
                {!! Form::hidden('progress', null) !!}

            </div>
            <div class="modal-footer ">
                <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Update
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    {!! Form::close() !!}

</div>
