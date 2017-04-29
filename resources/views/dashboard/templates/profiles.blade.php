@extends('dashboard.main')
<?php
if (!empty(Auth::user()->img_src)) {
    $img_src = Auth::user()->img_src;
} else {
    $img_src = ('avatar.png');
}

$taskDetailsToDo = $tasksModel->getPersonalizedTasks_ToDo(Auth::user()->id);
$taskDetailsDoing = $tasksModel->getPersonalizedTasks_Doing(Auth::user()->id);

$newArray = array();
$mainArray = array();
foreach ($taskDetailsToDo as $task) {

    $newKey = $task['project_title'];
    $newArray[$newKey][] = $task;

}

$todos = $todoModel->getToDos(Auth::user()->id);

$mainArray = $newArray;



?>
@section('content')
<?php

?>
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('dashboard.partials.error_validation')
    <div class="row">

        <div class="col-md-9 " id="profile-position">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->

                <div class="widget-user-header bg-yellow"
                     style="background: url('{{('../public/user_cover_images/').Auth::user()->cover_image }}') center center; background-size:cover; background-position-y: 30%;height:200px;">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-warning dropdown-toggle btn-xs" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#uplad-coverImage">Upload
                                    Cover Image</a></li>
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#uplad-profilePicture">Upload
                                    Profile Picture</a></li>
                        </ul>
                    </div>
                    <h3 class="widget-user-username">{{Auth::user()->name}} {{Auth::user()->last_name}}</h3>
                    <h5 class="widget-user-desc">{{Auth::user()->profession}}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ ('../public/user_profile_pictures/').$img_src }}"
                         style="width:100px; height: 100px; margin-top: 80px; " alt="User Avatar">
                </div>
                <div class="box-footer" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">Projects involved</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">Ongoing Tasks</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">Completed Tasks</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
            <div class="col-md-3 ">
                <!-- About Me Box -->
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            {{Auth::user()->education}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-birthday-cake margin-r-5"></i> Birthdate</strong>

                        <p class="text-muted">{{Auth::user()->birthdate}}</p>
                        <hr>
                        <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                        <p>
                            {{Auth::user()->email}}
                        </p>
                        @if(!empty(Auth::user()->experience))
                            <hr>
                            <strong><i class="fa fa-address-card margin-r-5"></i> Experience</strong>
                            <p>
                                {{Auth::user()->experience}}
                            </p>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom mynav-tabs-custom ">
                    <ul class="nav nav-tabs">
                        <li><a href="#todo" data-toggle="tab">Notes</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>

                    <div class="tab-content ">
                        <div class="active tab-pane" id="todo">

                            <!-- TO DO List -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>

                                    <h3 class="box-title">Notes
                                        <small style="font-style: italic;">Note: This is your personalized Note area .
                                            Only you can see this List
                                        </small>
                                    </h3>
                                </div>
                                <!-- /.box-header -->
                                @if(!empty($todos)))
                                <div class="box-body">
                                    <ul id="todoList" class="todo-list">
                                        @foreach($todos as $todo)
                                            <li id="todoItem{{$todo['id']}}">
                                                <i class="fa fa-list-ul"></i>
                                                <span class="text">{{ucfirst($todo['text'])}}</span>
                                                <small class="label label-danger"><i
                                                            class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($todo['created_at'])->diffForHumans()}}
                                                </small>
                                                <div class="pull-right">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o text-red"
                                                       onclick="deleteTodo({{$todo['id']}})"></i>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <span id="todo_id" style="display: none;">{{$todo['id']}}</span>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <div class="input-group">
                                        <input type="text" autofocus id="todoText{{$todo['id']}}" class="form-control"
                                               placeholder="Add Item..."/>
                                        <span id="todo_user" style="display: none;">{{Auth::user()->id}}</span>

                                    <span class="input-group-btn">
                                        <button type="button" id="add" onclick="saveToDo({{$todo['id']}})"
                                                class="btn btn-default pull-right">
                                            <i class="fa fa-plus"></i> Add item
                                        </button>
                                    </span>

                                    </div>
                                </div>
                                @else
                                    <div class="box-footer clearfix no-border">
                                        <div class="input-group">
                                            <input type="text" autofocus id="todoText1" class="form-control"
                                                   placeholder="Add Item..."/>
                                            <span id="todo_user" style="display: none;">{{Auth::user()->id}}</span>

                                    <span class="input-group-btn">
                                        <button type="button" id="add" onclick="saveToDo('1')"
                                                class="btn btn-default pull-right">
                                            <i class="fa fa-plus"></i> Add item
                                        </button>
                                    </span>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="settings">
                            {!! Form::model(Auth::user(), ['method'=>'PATCH','class'=>'form-horizontal', 'action' => ['ProfilesController@update', Auth::user()->id]]) !!}
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                    <input type="name" class="form-control" name="name" id="inputName"
                                           value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Last Name</label>

                                <div class="col-sm-10">
                                    <input type="name" class="form-control" name="last_name" id="inputName"
                                           value="{{Auth::user()->last_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="inputEmail"
                                           value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Profession</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="profession" id="inputName"
                                           value="{{Auth::user()->profession}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Education</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="education" id="inputName"
                                           value="{{Auth::user()->education}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Birthdate</label>

                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="birthdate" class="form-control pull-right"
                                               value="{{Auth::user()->birthdate}}" id="datepicker">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                <textarea class="form-control" name="experience"
                                          id="inputExperience">{{Auth::user()->experience}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Update Profile</button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->


</section>


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
<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios {
        border-radius: 20px;
    }

    .toggle.ios .toggle-handle {
        border-radius: 20px;
    }
</style>
<!--Create Task Modal -->

<div class="modal fade" id="uplad-coverImage" role="dialog">
    <div class="example-modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url' => http('/profile/uploadCoverImage'), 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                            <!-- quick email widget -->
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-tasks"></i>

                            <h3 class="box-title">Upload Cover Image</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"
                                        data-toggle="tooltip" title="Close">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <div class="form-group ">
                                <input type="file" class="form-control" name="cover_image">
                            </div>
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                        </div>
                        <div class="box-footer clearfix">
                            <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Upload
                            </button>
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


<div class="modal fade" id="uplad-profilePicture" role="dialog">
    <div class="example-modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::open(['url' => http('/profile/uploadProfilePicture'), 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                            <!-- quick email widget -->
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-tasks"></i>

                            <h3 class="box-title">Upload Profile Picture</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"
                                        data-toggle="tooltip" title="Close">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <div class="form-group ">
                                <input type="file" class="form-control" name="profile_picture">
                            </div>
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                        </div>
                        <div class="box-footer clearfix">
                            <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Upload
                            </button>
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

<!-- /.content -->
@endsection