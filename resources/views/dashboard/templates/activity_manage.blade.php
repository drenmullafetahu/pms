@extends('dashboard.main')
<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;
$activityDetails = $activitiesModel->getDetailedActivities();
$projects = [];
$assigned_to = [];
$priority = [];
$status = [];

foreach ($activityDetails as $activity) {
    if (!empty($activity)) {
        $project_id = $activity['project_id'];
        $projects[$activity['project_id']] = $activity['project_title'];
        $assigned_to[$activity['assigned_to']] = $activity['name'] . ' ' . $activity['last_name'];
        $priority[$activity['priority_id']] = $activity['priority_title'];
    }
}

?>

        <!-- Content Header (Page header) -->
@section('content')
    @include('dashboard.partials.error_validation')
    <section class="content-header">
        <h1>
            Manage Activities
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Manage Activities</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Activity Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="ex1" class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Activity Name</th>
                                <th>Project Name</th>
                                <th>Posted By</th>
                                <th>Project Manager</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Deadline</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($activityDetails))
                                @foreach($activityDetails as $activity)
                                    <tr>
                                        <td><i class="fa fa-arrows-alt text-red margin-r-5"></i> {{$activity['id']}}
                                        </td>
                                        <td>
                                            <?php $in = $activity['activity_title'];
                                            echo $shortDesc = strlen($in) > 20 ? substr($in, 0, 20) . "..." : $in;?>
                                        </td>
                                        <td>{{$activity['project_id'] = $activity['project_title']}}</td>
                                        <td>{{ $activity['modified_by']}}</td>
                                        <td>{{$activity['assigned_to'] =$activity['name'].' '. $activity['last_name']}}</td>
                                        <td><?php $in = $activity['activity_description'];
                                            echo $shortDesc = strlen($in) > 50 ? substr($in, 0, 20) . "..." : $in;?>
                                        </td>
                                        <td><span class="label label-warning">{{$activity['priority_id'] = $activity['priority_title']}}
                                                ! </span></td>

                                        <td><span class="label label-danger">{{$activity['due_date']}}</span></td>
                                        <td>
                                            <p data-original-title="Edit" data-placement="top" data-toggle="tooltip"
                                               title="">
                                                <button class="edit btn btn-success btn-xs" data-title="Edit"
                                                        data-toggle="modal"
                                                        data-target="#edit-task-{{$activity['id']}}"><span
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
                                                        data-toggle="modal"
                                                        data-target="#delete-task-{{$activity['id']}}"><span
                                                            class="glyphicon glyphicon-trash"></span></button>
                                            </p>
                                        </td>
                                    </tr>
                                    @include('dashboard.layout.modals.activities.editActivities')
                                    @include('dashboard.layout.modals.Activities.deleteActivities')
                                @endforeach
                            @endif
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

