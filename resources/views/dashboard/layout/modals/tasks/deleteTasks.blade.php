<div class="modal fade" id="delete-task-{{$task['id']}}" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::model($task, ['method'=>'DELETE', 'action' => ['TasksController@destroy', $task['id']]]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading"><i
                            class="fa fa-trash-o fa-lg text-red margin-r-4"></i> Delete !</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-lg margin-r-5"></i> Are you sure
                    you want to delete "{{$task['task_title']}}"?
                </div>
            </div>
            <div class="modal-footer ">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                            class="glyphicon glyphicon-remove"></span> No
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    {!! Form::close() !!}
</div>