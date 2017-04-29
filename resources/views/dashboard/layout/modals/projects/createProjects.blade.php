<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;


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
<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios {
        border-radius: 20px;
    }

    .toggle.ios .toggle-handle {
        border-radius: 20px;
    }
</style>
<!--Create Task Modal -->

<div class="modal fade" id="create-project-modal" role="dialog">
    <div class="example-modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- quick email widget -->
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-tasks"></i>

                            <h3 class="box-title">Create Project</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"
                                        data-toggle="tooltip" title="Close">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            {!! Form::open(['url' => http('/projects'), 'method' => 'post']) !!}
                            <div class="form-group ">
                                <label>Title</label>
                                <input type="text" class="form-control input-lg" name="project_title"
                                       placeholder="Enter ...">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="textarea" name="project_description" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <div class="form-group">
                                {{--<div class="row">--}}
                                {{--<div class="col-xs-5">--}}
                                {{--<label>Select State</label>--}}
                                {{--{!! Form::select('state', $states , $state['state_id'], ['class' => 'form-control select2','style'=>'width:100%']) !!}--}}
                                {{--</div>--}}
                                {{--<!-- /.form group -->--}}
                                {{--<div class="col-xs-5">--}}
                                {{--<label>Select City</label>--}}
                                {{--{!! Form::select('city',$cities,$city['city_id'], ['class' => 'form-control select2','style'=>'width:100%']) !!}--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <!-- StartDate EndDate and time range -->
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <label>Project Cost</label>
                                        <input type="text" class="form-control" name="project_cost" placeholder="$">
                                    </div>

                                    <div class="col-xs-5">
                                        <label>Project budget</label>
                                        <input type="text" class="form-control" name="project_budget" placeholder="$">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Activate</label>
                                {{Form::hidden('active',0)}}
                                {{Form::checkbox('active')}}
                                {{--<input  data-toggle="toggle" data-onstyle="warning" data-offstyle="danger" name="active" type="checkbox">--}}
                            </div>
                            {!! Form::hidden('created_by', Auth::user()->id) !!}
                            {!! Form::hidden('modified_by', Auth::user()->id) !!}
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
