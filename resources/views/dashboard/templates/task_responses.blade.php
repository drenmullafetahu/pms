@extends('dashboard.main')
<?php
$taskResponses = $taskResponsesModel->getTaskResponses();

?>
@section('content')
    @include('dashboard.partials.error_validation')
    <section class="content-header">
        <h1>
            Task Responses
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tasks</li>
            <li class="active">Task Responses</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Collapsible Accordion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    @foreach($taskResponses as $response)
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title" id="responseTitle">
                                    <a data-toggle="collapse"
                                       data-parent="#accordion" href="#{{$response['task_id']}}">
                                        {{ucfirst($response['task_title']) . ' - ' . $response['name'].' '.$response['last_name'] }}
                                    </a>
                                </h4>
                                <button type="button" data-toggle="modal"
                                        data-target="#task-response-approve-{{$response['task_id']}}" title="Approve"
                                        data-placement="bottom" class="btn btn-info btn-xs pull-right "><i
                                            class="ion-checkmark-round"></i></button>
                                <button type="button" data-toggle="modal"
                                        data-target="#task-response-reject-{{$response['task_id']}}" title="Reject"
                                        data-placement="bottom" class="btn btn-danger btn-xs pull-right margin-r-5 "><i
                                            class="ion-ios-undo"></i></button>
                            </div>
                            <div id="{{$response['task_id']}}"
                                 class="panel-collapse collapse  ">
                                <div class="box-body task-response-table" id="responseCollapse-Inside "
                                     style="overflow-x:auto;">
                                    <table class="table table-condensed">
                                        <tr>
                                            <th style="width: 50px">Task</th>
                                            <th style="width: 200px">Task Description</th>
                                            <th style="width: 20px">Assigned to</th>
                                            <th style="width: 10px">Activity</th>
                                            <th style="width: 40px">Project</th>
                                            <th style="width: 10px">File ID</th>
                                        </tr>
                                        <tr>
                                            <td>{{ucfirst($response['task_title'])}}</td>
                                            <td>{{ucfirst($response['task_description'])}}</td>
                                            <td>{{ucfirst($response['name'].' '.$response['last_name'])}}</td>
                                            <td>
                                                <span class="badge bg-aqua">{{ucfirst($response['activity_title'])}}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-red">{{ucfirst($response['project_title'])}}</span>
                                            </td>
                                            {{--<td><span class="badge bg-green">{{$response['file_id']}}</span></td>--}}
                                        </tr>
                                    </table>
                                    <hr>
                                    <dl>
                                        <dt>Comment</dt>
                                        <?php $taskResponsesComment = $taskResponsesModel->getTaskResponseComment($response['task_id']); ?>
                                        @foreach($taskResponsesComment as $response_comment)
                                            <blockquote>
                                                <label class="text-sm text-muted">{{$response_comment['response_created_date']}}</label>

                                                <p>{{ucfirst($response_comment['comment'])}}</p>
                                                <small>Posted by <cite
                                                            title="Source Title">{{$response_comment['name']. ' ' . $response_comment['last_name']}}</cite>
                                                </small>
                                            </blockquote>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('dashboard.layout.modals.tasks.task_responses.task_response_approve')
                    @include('dashboard.layout.modals.tasks.task_responses.task_response_reject')
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <!-- /.box -->
    </section>
@endsection