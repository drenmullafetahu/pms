@extends('dashboard.main')
<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;
$projectDetails = $projectsModel->getDetailedProjects();
foreach ($projectDetails as $project) {
    $projects[$project['project_id']] = $project['project_title'];
}
?>

        <!-- Content Header (Page header) -->
@section('content')
    @include('dashboard.partials.error_validation')
    <section class="content-header">
        <h1>
            Manage Projects
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Manage Projects</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Project Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="ex1" class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Posted By</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Project Budget</th>
                                <th>Project Cost</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($projectDetails))
                                @foreach($projectDetails as $project)
                                    <?php if ($project['active'] == '0')
                                        $active = $project['active'] = 'Disabled';
                                    else
                                        $active = $project['active'] = 'Enabled';?>
                                    <tr>
                                        <td>
                                            <i class="fa fa-arrows-alt text-red margin-r-5"></i> {{$project['project_id']}}
                                        </td>
                                        <td>
                                            <?php $in = $project['project_title'];
                                            echo $shortDesc = strlen($in) > 20 ? substr($in, 0, 20) . "..." : $in;?>
                                        </td>

                                        <td><?php $in = $project['project_description'];
                                            echo $shortDesc = strlen($in) > 50 ? substr($in, 0, 20) . "..." : $in;?>
                                        </td>
                                        <td>{{$project['created_by'] = $project['name']. ' '.$project['last_name']}}</td>
                                        <td>{{$project['state']}}</td>
                                        <td>{{$project['city']}}</td>
                                        <td>{{$project['startDate']}}</td>
                                        <td>{{$project['endDate']}}</td>
                                        <td>{{$project['project_budget']}}</td>
                                        <td>{{$project['project_cost']}}</td>
                                        <td>{{$active}}</td>
                                        <td>
                                            <p data-original-title="Edit" data-placement="top" data-toggle="tooltip"
                                               title="">
                                                <button class="edit btn btn-success btn-xs" data-title="Edit"
                                                        data-toggle="modal"
                                                        data-target="#edit-project-{{$project['project_id']}}"><span
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
                                                        data-target="#delete-project-{{$project['project_id']}}"><span
                                                            class="glyphicon glyphicon-trash"></span></button>
                                            </p>
                                        </td>
                                    </tr>
                                    @include('dashboard.layout.modals.projects.editProjects')
                                    @include('dashboard.layout.modals.projects.deleteProjects')
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

