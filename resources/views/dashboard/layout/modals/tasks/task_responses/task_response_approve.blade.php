<?php

$taskResponses = $taskResponsesModel->getTaskResponses();
?>
@foreach($taskResponses as $task)
    <div class="modal fade" id="task-response-approve-{{$task['task_id']}}" role="dialog">
        <div class="example-modal">
            <div class="modal modal-warning">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title"><i class="ion ion-paper-airplane"></i>
                                <small style="color:white;">Respond to Task - {{$task['task_title']}}</small>
                            </h3>
                        </div>
                        <div class="modal-body">
                            {!! Form::model($taskResponses, ['method'=>'post', 'action' => ['TaskResponsesController@approve', $task['task_id']]]) !!}
                            <label>Are you sure you want to Approve the task "{{$task['task_title']}}" ?</label>

                        </div>
                        {{--modal-body-end--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-outline">Yes</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                            <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
        <!-- /.example-modal -->
    </div>
@endforeach