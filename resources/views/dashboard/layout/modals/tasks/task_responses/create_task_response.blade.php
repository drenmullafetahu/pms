<?php

$taskDetailsToDo = $tasksModel->getPersonalizedTasks_ToDo(Auth::user()->id);
$taskDetailsDoing = $tasksModel->getPersonalizedTasks_Doing(Auth::user()->id);
?>
@foreach($taskDetailsDoing as $task)
    <div class="modal fade" id="respond-task-{{$task['task_id']}}" role="dialog">
        <div class="example-modal">
            <div class="modal modal-warning">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title"><i class="ion ion-paper-airplane"></i>
                                <small style="color:white;">Push Response to Task - {{$task['task_title']}}</small>
                            </h3>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => http('/tasks-response'), 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                            <div class="form-group">
                                <label>Task id</label>
                                <input type="text" value="{{$task['task_id']}}" class="form-control"
                                       placeholder="Enter ..." disabled>
                                <input type="hidden" name="task_id" value="{{$task['task_id']}}">
                            </div>
                            <input type="hidden" name="posted_by" value="{{Auth::user()->id}}">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" name="comment" id="comment" rows="2"
                                          placeholder="Enter your Response Comment here"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>File Name</label>
                                        <input class="form-control input-sm" id="file_title" name="file_title"
                                               type="text" placeholder="Enter a File Name">
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="file" name="file" id="exampleInputFile">
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{--modal-body-end--}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline">Save changes</button>
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