<?php
$taskResponses = $taskResponsesModel->getTaskResponses();
?>
@foreach($taskResponses as $task)
    <div class="modal fade" id="task-response-reject-{{$task['task_id']}}" role="dialog">
        <div class="example-modal">
            <div class="modal modal-danger">
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
                            {!! Form::model($task, ['method'=>'Post', 'action' => ['TaskResponsesController@reject', $task['task_id']]]) !!}
                            <label>Are you sure you want to Reject the task "{{$task['task_title']}}" ?</label>
                            </br>
                            <label class="text-sm">Please Tell the User Why you are rejecting this Response</label>
                            <textarea class="form-control" name="comment" id="comment" rows="2"
                                      placeholder="Enter your Response Comment here"></textarea>
                            </br>
                            <label class="small cm-quote" style="font-style:italic"> Note: Rejecting a Task response
                                pushes the task to "To do Label" again </label>
                        </div>
                        {{--modal-body-end--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-outline">Yes</button>
                        </div>
                    </div>
                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                    {!! Form::hidden('task_id', $task['task_id']) !!}
                    {!! Form::hidden('task_response_id', $task['task_id']) !!}
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