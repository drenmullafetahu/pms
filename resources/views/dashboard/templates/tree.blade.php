@extends('dashboard.main')
<?php
$tasks_no = $tasksModel->getTasksNumber();
$trees = $treesModel->getTree();


?>
@section('content')
    @include('dashboard.partials.error_validation')
    <section class="content-header">
        <h1>
            Tree View
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tree View</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box-tools ">
                    <div class="has-feedback">
                        <input type="text" class="form-control input-sm margin-bottom" id="search_tree"
                               placeholder="Search Tasks">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </div>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <div id="jstree" style="overflow-x: scroll;">

                            <?php echo $trees ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Labels</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-9" id="Task_details">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Task</h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Task">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i
                                            class="fa fa-pencil-square-o "></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <div id="right-Treeview" class="col-md-12" style="visibility: hidden;">
                                <!-- Widget: user widget style 1 -->
                                <div id="insight-Treeview" class="box box-widget widget-user animated fadeIn">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-primary">

                                        <h3 class="widget-user-username"></h3>

                                        <h5 class="widget-user-desc"></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img id="task_image" class="img-circle" src="" alt="User Avatar">

                                    </div>
                                    </br>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div>
                                                <div class="box box-solid">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Task Details</h3>
                                                    </div>
                                                    <!-- /.box-header -->
                                                    <div class="box-body">
                                                        <div class="box-group" id="accordion">
                                                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                                            <div class="panel box box-primary">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">
                                                                        <a data-toggle="collapse"
                                                                           data-parent="#accordion" href="#collapseOne">
                                                                            Task Details
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseOne"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="box-body">
                                                                        <dl>
                                                                            <dt>Assigned To</dt>
                                                                            <dd id="dd_assigned_to"></dd>
                                                                            <dt>Description</dt>
                                                                            <dd id="dd_description"></dd>
                                                                            <dt>Status Title</dt>
                                                                            <dd id="dd_status_title"></dd>
                                                                            <dt>Due Date</dt>
                                                                            <dd id="dd_due_date"></dd>
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel box box-danger">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">
                                                                        <a data-toggle="collapse"
                                                                           data-parent="#accordion" href="#collapseTwo">
                                                                            Collapsible Group Danger
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                                    <div class="box-body">
                                                                        Anim pariatur cliche reprehenderit, enim eiusmod
                                                                        high life accusamus terry richardson ad squid. 3
                                                                        wolf moon officia aute, non cupidatat skateboard
                                                                        dolor brunch. Food truck quinoa nesciunt laborum
                                                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                                        put a bird on it squid single-origin coffee
                                                                        nulla
                                                                        assumenda shoreditch et. Nihil anim keffiyeh
                                                                        helvetica, craft beer labore wes anderson cred
                                                                        nesciunt sapiente ea proident. Ad vegan
                                                                        excepteur butcher vice lomo. Leggings occaecat
                                                                        craft beer
                                                                        farm-to-table, raw denim aesthetic synth
                                                                        nesciunt you probably haven't heard of them
                                                                        accusamus
                                                                        labore sustainable VHS.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel box box-success">
                                                                <div class="box-header with-border">
                                                                    <h4 class="box-title">
                                                                        <a data-toggle="collapse"
                                                                           data-parent="#accordion"
                                                                           href="#collapseThree">
                                                                            Collapsible Group Success
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseThree" class="panel-collapse collapse">
                                                                    <div class="box-body">
                                                                        Anim pariatur cliche reprehenderit, enim eiusmod
                                                                        high life accusamus terry richardson ad squid. 3
                                                                        wolf moon officia aute, non cupidatat skateboard
                                                                        dolor brunch. Food truck quinoa nesciunt laborum
                                                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                                        put a bird on it squid single-origin coffee
                                                                        nulla
                                                                        assumenda shoreditch et. Nihil anim keffiyeh
                                                                        helvetica, craft beer labore wes anderson cred
                                                                        nesciunt sapiente ea proident. Ad vegan
                                                                        excepteur butcher vice lomo. Leggings occaecat
                                                                        craft beer
                                                                        farm-to-table, raw denim aesthetic synth
                                                                        nesciunt you probably haven't heard of them
                                                                        accusamus
                                                                        labore sustainable VHS.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                                <!-- /.box -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i
                                            class="fa fa-pencil-square-o "></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection