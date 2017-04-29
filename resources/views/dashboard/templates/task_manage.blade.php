@extends('dashboard.main')
<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;
$taskDetails = $tasksModel->getDetailedTasks();


?>

        <!-- Content Header (Page header) -->
@section('content')
    @include('dashboard.partials.error_validation')
    <section class="content-header">
        <h1>
            Manage Tasks
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Manage Tasks</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Task Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="ex1" class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Task Name</th>
                                <th>Project Name</th>
                                <th>Activity Name</th>
                                <th>Posted By</th>
                                <th>Assigned To</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taskDetails as $task)


                                <tr>
                                    <td><i class="fa fa-arrows-alt text-red margin-r-5"></i> {{$task['id']}}</td>
                                    <td>
                                        <?php $in = $task['task_title'];
                                        echo $shortDesc = strlen($in) > 20 ? substr($in, 0, 20) . "..." : $in;?>
                                    </td>
                                    <td>{{$task['project_title']}}</td>
                                    <td>{{$task['activity_title']}}</td>
                                    <td>{{ $task['created_by']}}</td>
                                    <td>{{$task['assigned_to']}}</td>
                                    <td><?php $in = $task['task_description'];
                                        echo $shortDesc = strlen($in) > 50 ? substr($in, 0, 20) . "..." : $in;?>
                                    </td>
                                    <td><span class="label label-warning">{{$task['priority'] }}
                                            ! </span></td>
                                    <td>
                                        <span class="label label-success">{{$task['status_id'] = $task['status_title']}}</span>
                                    </td>
                                    <td><span class="label label-danger">{{$task['due_date']}}</span></td>
                                    <td>
                                        <p data-original-title="Edit" data-placement="top" data-toggle="tooltip"
                                           title="">
                                            <button class="edit btn btn-success btn-xs" data-title="Edit"
                                                    data-toggle="modal"
                                                    data-target="#edit-task-{{$task['id']}}"><span
                                                        class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                        </p>

                                        {{--<a href="{{ http_admin("/tasks/edit".$task['id'])  }}"--}}
                                        {{--class="icons fa fa-pencil-square-o fa-2x"></a>--}}
                                    </td>
                                    <td>
                                        <p data-original-title="Delete" data-placement="top" data-toggle="tooltip"
                                           title="">
                                            <button class="btn btn-danger btn-xs" data-title="Delete"
                                                    data-toggle="modal" data-target="#delete-task-{{$task['id']}}"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                        </p>
                                    </td>
                                </tr>
                                @include('dashboard.layout.modals.tasks.editTasks')
                                @include('dashboard.layout.modals.tasks.deleteTasks')

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>

@endsection

