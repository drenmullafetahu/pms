<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;

$usersDetails = $activitiesModel->getUsers();
$projectsDetails = $activitiesModel->getProjects();
$prioritiesDetails = $activitiesModel->getPriorities();
$statusesDetails = $activitiesModel->getStatuses();
$users = [];


foreach ($usersDetails as $user) {
    if (!empty($user)) {
        $users[$user['user_id']] = $user['name'];
    }
}
$projects = [];
foreach ($projectsDetails as $project) {
    $projects[$project['id']] = $project['project_title'];
}
$projectId = (isset($project['id'])) ? $project['id'] : '';

$priorities = [];
foreach ($prioritiesDetails as $priority) {
    $priorities[$priority['id']] = $priority['priority_title'];
}
$priorityId = (isset($priority['id'])) ? $priority['id'] : '';

$statues = [];
foreach ($statusesDetails as $status) {
    $statuses[$status['id']] = $status['status_title'];
}
$statusesId = (isset($status['id'])) ? $status['id'] : '';

?>
<style>
    .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
    }

    .example-modal .modal {
        background: transparent !important;
    }
</style>
<!--Create Task Modal -->
<div class="modal fade" id="create-activity-modal" role="dialog">
    <div class="example-modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- quick email widget -->
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-tasks"></i>

                            <h3 class="box-title">Create Activity</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"
                                        data-toggle="tooltip" title="Close">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            {!! Form::open(['url' => http('/activities'), 'method' => 'post']) !!}
                            {!! Form::hidden('activity_unique_id',$activity_unique_id = rand(5, 15)) !!}
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="activity_title" placeholder="Enter ...">
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Due Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" name="due_date" class="form-control pull-right">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>Description</label>

                                <textarea class="textarea" name="activity_description"
                                          placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Select Project</label>
                                {!! Form::select('project_id', $projects ,$projectId, ['class' => 'form-control select2','style'=>'width:100%']) !!}
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Assign a Project Manager</label>
                                {!! Form::select('assigned_to',$users,$user['user_id'],['class' => 'form-control select2','style'=>'width:100%']) !!}
                            </div>

                            <div class="form-group">
                                <label>Select Priority</label>
                                {!! Form::select('priority_id', $priorities , $priorityId,['class' => 'form-control select2','style'=>'width:100%']) !!}
                            </div>

                            {!! Form::hidden('created_by', Auth::user()->id) !!}
                            {!! Form::hidden('modified_by', Auth::user()->id) !!}
                            {!! Form::hidden('progress', null) !!}
                        </div>
                        <div class="box-footer clearfix">
                            <button type="submit" class="pull-right btn btn-default" id="sendEmail">Submit <i
                                        class="fa fa-arrow-circle-right"></i></button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- /.example-modal -->
</div>