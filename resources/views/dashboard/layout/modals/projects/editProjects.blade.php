<?php
$img_src = Auth::user()->img_src . '.' . 'jpg';
$user = Auth::user()->id;


$statesDetails = $projectsModel->getStatesAndCities();
$citiesDetails = $projectsModel->getStatesAndCities();


foreach ($statesDetails as $state) {
    $states[$state['state_id']] = $state['state_title'];
}
foreach ($citiesDetails as $city) {
    $cities[$city['city_id']] = $city['city_title'];
}

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

<div class="modal fade" id="edit-project-{{$project['project_id']}}" role="dialog">
    <div class="example-modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    {!! Form::model($project, ['method'=>'Patch', 'action' => ['ProjectsController@update', $project['project_id']]]) !!}
                            <!-- quick email widget -->
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-tasks"></i>

                            <h3 class="box-title">Edit Project</h3>
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
                                <label>Title</label>
                                <input type="text" class="form-control input-lg" value="{{$project['project_title']}}"
                                       name="project_title"
                                       placeholder="Enter ...">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="textarea" name="project_description" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$project['project_description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <label>Select State</label>
                                        {!! Form::select('state', $states , $state['state_id'], ['class' => 'form-control select2','style'=>'width:100%']) !!}
                                    </div>
                                    <!-- /.form group -->
                                    <div class="col-xs-5">
                                        <label>Select City</label>
                                        {!! Form::select('city',$cities,$city['city_id'], ['class' => 'form-control select2','style'=>'width:100%']) !!}
                                    </div>
                                </div>
                                <!-- StartDate EndDate and time range -->
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <label>Project Cost</label>
                                        <input type="text" class="form-control" value="{{$project['project_cost']}}"
                                               name="project_cost" placeholder="$">
                                    </div>

                                    <div class="col-xs-5">
                                        <label>Project budget</label>
                                        <input type="text" class="form-control" value="{{$project['project_budget']}}"
                                               name="project_budget" placeholder="$">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Activate</label>
                                {{Form::hidden('active',0)}}
                                {{Form::checkbox('active', '1',$project['active'])}}

                            </div>
                            {!! Form::hidden('modified_by', Auth::user()->id) !!}

                        </div>
                        <div class="box-footer clearfix">
                            <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                        class="glyphicon glyphicon-ok-sign"></span> Update
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

