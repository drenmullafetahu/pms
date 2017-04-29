@extends('dashboard.main')
<?php
$img_src = Auth::user()->img_src;
$user = Auth::user()->id;
$tasks = $tasksModel->getLatestTasks();
$tasks_no = $tasksModel->getTasksNumber();


$projects = $projectsModel->getProjectNumber();
foreach ($projects as $project) {
    $project_count = $project['project_count'];
}

foreach ($tasks_no as $tNo) {
    $task_count = $tNo['task_count'];
}

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysql_connect('localhost', 'root', '');
mysql_select_db('pms', $link);
$q = mysql_query("SHOW TABLE STATUS");
$size = 0;
while ($row = mysql_fetch_array($q)) {
    $size += $row["Data_length"] + $row["Index_length"];
}
$decimals = 2;
$mbytes = number_format($size / (1024 * 1024), $decimals);


$taskDetailsToDo = $tasksModel->getPersonalizedTasks_ToDo(Auth::user()->id);
$taskDetailsDoing = $tasksModel->getPersonalizedTasks_Doing(Auth::user()->id);
$taskDetailsPending = $tasksModel->getPersonalizedTasks_Pending(Auth::user()->id);
$taskDetailsCompleted = $tasksModel->getPersonalizedTasks_Completed(Auth::user()->id);

?>

@section('content')
    @include('dashboard.partials.error_validation')

    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 1.0 beta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @role(['owner','admin'])
                <!-- Info boxes -->
        <div class="row">
            @role('owner')
            <div class="col-md-3 col-sm- col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-analytics"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Database Usage</span>
                        <span class="info-box-number">{{$mbytes}}
                            <small> MB</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            @endrole

                    <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <a href="{{http('/projects')}}">
                <div class="col-md-3 col-sm-7 col-xs-3 margin">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-android-folder-open"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Ongoing Total Projects <span
                                        class="info-box-number">{{ $project_count}}</span> </span>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </a>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <a href="{{http('/manage/tasks')}}">
                <div class="col-md-3 col-sm-7 col-xs-3 margin">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="ion ion-android-clipboard"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Ongoing Total Tasks  <span
                                        class="info-box-number">{{ $task_count}}</span> </span>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </a>
        </div>
        @endrole
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header bg-aqua-gradient">
                            <h3 class="box-title boxTitle" id="boxTitle"><i class="fa fa-tasks  margin-r-5"></i>To do
                                Board</h3>
                        </div>
                        <div class="box-body">
                            <div class="nav-tabs-custom" style="height:400px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#todo" onclick="updateKanaban()" data-toggle="tab">To
                                            do</a></li>
                                    <li><a href="#doing" onclick="updateKanaban()" data-toggle="tab">Doing</a></li>
                                    <li><a href="#pending" onclick="updateKanaban()" data-toggle="tab">Pending</a></li>
                                    <li><a href="#done" onclick="updateKanaban()" data-toggle="tab">Done</a></li>
                                </ul>
                                <div class="tab-content ">
                                    <div class="active tab-pane" id="todo"
                                         style="overflow-y:auto;overflow-x: hidden; max-height:350px;">
                                        @foreach($taskDetailsToDo as $task)
                                            <div id="card-columns-{{$task['task_id']}}" style="margin-top: 1%;">
                                                <div class="card card-block"
                                                     style=" width:95%; height:80%; margin: 0 auto;">
                                                    <a href="">
                                                        <h4 class="card-title">{{$task['task_title']}}</a> </h4>
                                                <span class="pull-right" style="margin-right: 5%">
                                                    <div class="avatar pull-right">
                                                        <img src="{{ ('../public/user_profile_pictures/').$task['img_src'] }}"
                                                             alt=""/>
                                                    </div>
                                                </span>

                                                    <p class="card-text small">{{$task['task_description']}}</p>

                                                    <p class="card-text kanaban-p">
                                                        <small class="text-muted">
                                                            <i class="fa fa-clock-o "></i> Last
                                                            updated {{\Carbon\Carbon::parse($task['updated_at'])->diffForHumans()}}
                                                        </small>
                                                        <label>
                                                            <small><i class="fa fa-clock-o "></i> due
                                                                date:{{$task['due_date']}}</small>
                                                        </label>
                                                        <small>
                                                            <label class="label label-default kanabanLabel">
                                                                {{ $task['status_title']}}
                                                            </label>
                                                        </small>
                                                    </p>
                                                    <div class="footer">
                                                        <a onclick="sendToDoing({{$task['task_id']}})"
                                                           class="btn btn-warning btn-xs">Start doing Task</a>
                                                        <a data-toggle="modal"
                                                           data-target="#task-info-{{$task['task_id']}}"
                                                           class="btn btn-info btn-xs">Task Info</a>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </div>
                                            @include('dashboard.layout.modals.tasks.task_info')
                                        @endforeach
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="doing"
                                         style="overflow-y:auto; overflow-x: hidden; max-height:350px;">
                                        @foreach($taskDetailsDoing as $task)
                                            <div id="card-columns-{{$task['task_id']}}"
                                                 style="margin-top: 1%; overflow-y:hidden;">
                                                <div class="card card-block"
                                                     style=" width:95%; height:80%; margin: 0 auto;">
                                                    <div class="btn-group pull-right">
                                                        <button type="button"
                                                                class="btn btn-warning dropdown-toggle btn-xs"
                                                                data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="javascript:void(0)"
                                                                   onclick="sendToToDo({{$task['task_id']}})">Move Back
                                                                    to to do List</a></li>
                                                            <li><a href="javascript:void(0)"
                                                                   onclick="register_popup({{$task['user_id']}})">Chat
                                                                    with {{$task['name']}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="card-title">
                                                        <a href=""> {{$task['task_title']}}</a></h4>
                                                <span class="pull-right" style="margin-right: 5%">
                                                    <div class="avatar pull-right">
                                                        <img src="{{ ('../public/user_profile_pictures/').$task['img_src']}}"
                                                             alt=""/>
                                                    </div>
                                                </span>

                                                    <p class="card-text small">{{$task['task_description']}}</p>

                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            <i class="fa fa-clock-o "></i> Last
                                                            updated {{\Carbon\Carbon::parse($task['updated_at'])->diffForHumans()}}
                                                        </small>
                                                        <label>
                                                            <small><i class="fa fa-clock-o "></i> due
                                                                date:{{$task['due_date']}}</small>
                                                        </label>
                                                        <small>
                                                            <label class="label label-warning kanabanLabel">
                                                                {{ $task['status_title']}}
                                                            </label>
                                                        </small>
                                                    </p>
                                                    <div class="footer">
                                                        <a data-toggle="modal"
                                                           data-target="#respond-task-{{$task['task_id']}}"
                                                           class="btn btn-warning btn-xs">Complete Task</a>
                                                        <a data-toggle="modal"
                                                           data-target="#task-info-{{$task['task_id']}}"
                                                           class="btn btn-info btn-xs">Task Info</a>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </div>
                                            @include('dashboard.layout.modals.tasks.task_info')
                                        @endforeach
                                    </div>

                                    @include('dashboard.layout.modals.tasks.task_responses.create_task_response')
                                            <!-- /.tab-pane -->
                                    <div class="tab-pane" id="pending">
                                        @foreach($taskDetailsPending as $task)
                                            <div id="card-columns-{{$task['task_id']}}"
                                                 style="margin-top: 1%; overflow-y:hidden;">
                                                <div class="card card-block"
                                                     style=" width:95%; height:80%; margin: 0 auto;">
                                                    <h4 class="card-title">
                                                        <a href=""> {{$task['task_title']}}</a></h4>
                                                <span class="pull-right" style="margin-right: 5%">
                                                    <div class="avatar pull-right">
                                                        <img src="{{ ('../public/user_profile_pictures/').$task['img_src']}}"
                                                             alt=""/>
                                                    </div>
                                                </span>

                                                    <p class="card-text small">{{$task['task_description']}}</p>

                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            <i class="fa fa-clock-o "></i> Last
                                                            updated {{\Carbon\Carbon::parse($task['updated_at'])->diffForHumans()}}
                                                        </small>
                                                        <label>
                                                            <small><i class="fa fa-clock-o "></i> due
                                                                date:{{$task['due_date']}}</small>
                                                        </label>
                                                        <small>
                                                            <label class="label label-info kanabanLabel">
                                                                {{ $task['status_title']}}
                                                            </label>
                                                        </small>
                                                    </p>
                                                    <div class="footer">
                                                        <a data-toggle="modal"
                                                           data-target="#task-info-{{$task['task_id']}}"
                                                           class="btn btn-info btn-xs">Task Info</a>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </div>
                                            @include('dashboard.layout.modals.tasks.task_info')
                                        @endforeach
                                    </div>

                                    <div class="tab-pane" id="done"
                                         style="overflow-y: auto;overflow-x: hidden;max-height: 350px;">
                                        @foreach($taskDetailsCompleted as $task)
                                            <div id="card-columns-{{$task['task_id']}}"
                                                 style="margin-top: 1%; overflow-y:hidden;">
                                                <div class="card card-block"
                                                     style=" width:95%; height:80%; margin: 0 auto;">
                                                    <h4 class="card-title">
                                                        <a href=""> {{$task['task_title']}}</a></h4>
                                                <span class="pull-right" style="margin-right: 5%">
                                                    <div class="avatar pull-right">
                                                        <img src="{{ ('../public/user_profile_pictures/').$task['img_src']}}"
                                                             alt=""/>
                                                    </div>
                                                </span>

                                                    <p class="card-text small">{{$task['task_description']}}</p>

                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            <i class="fa fa-clock-o "></i> Last
                                                            updated {{\Carbon\Carbon::parse($task['updated_at'])->diffForHumans()}}
                                                        </small>
                                                        <label>
                                                            <small><i class="fa fa-clock-o "></i> due
                                                                date:{{$task['due_date']}}</small>
                                                        </label>
                                                        <small>
                                                            <label class="label label-success kanabanLabel">
                                                                {{ $task['status_title']}}
                                                            </label>
                                                        </small>
                                                    </p>
                                                    {{--<div class="footer">--}}
                                                    {{--<a data-toggle="modal" data-target="#task-info-{{$task['task_id']}}"--}}
                                                    {{--class="btn btn-info btn-xs">Task Info</a>--}}
                                                    {{--</div>--}}
                                                </div>
                                                <hr/>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header bg-green-gradient">
                            <h3 class="box-title" id="boxTitle"><i class="fa fa-tasks  margin-r-5"></i>Latest Task
                                Activities</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive " style="overflow: hidden;">
                            <table id="ex2" class="table table-hover ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Assigned To</th>
                                    <th>Task</th>
                                    <th>Project</th>
                                    <th>Date</th>
                                    <th>Status</th>

                                    {{--<th style="display:none;"></th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td><i class="fa fa-arrows-alt text-red margin-r-5"></i> {{$task['id']}}</td>
                                        <td>
                                            <div class="user-image">
                                                <img class="img-circle img-bordered-sm"
                                                     src="{{ ('../public/user_profile_pictures/')}}{{$task['img_src']}}"
                                                     style="width:40px;height:40px;" alt="user image">
                                            </div>
                                        </td>
                                        <td>{{$task['task_title']}}</td>
                                        <td>{{$task['project_title']}}</td>
                                        <td>{{\Carbon\Carbon::parse($task['created_at'])->diffForHumans()}}</td>
                                        <td><span class="label label-success">{{$task['status_title']}}</span></td>

                                        {{--<td style="display: none;">{{$task['name'].' '.$task['last_name']}}</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!-- /.box -->
                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- BAR CHART -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal Performance</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="myCanvas" style="height:230px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <!-- /.col -->
                <div class="col-md-6">
                    <!-- BAR CHART -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal Performance
                                <small>Compared to others</small>
                            </h3>
                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="myCanvas1" style="height:230px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection