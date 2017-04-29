<div class="modal fade" id="task-info-{{$task['task_id']}}" role="dialog">
    <div class="example-modal">
        <div class="modal modal-info">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><i class="ion ion-information-circled"></i>
                            <small style="color:white;"> Detailed Task Info</small>
                        </h3>

                    </div>
                    <div class="modal-body">

                        <dl class="dl-horizontal">
                            <dt>Task Id</dt>
                            <dd>{{$task['task_id']}}</dd>
                            <dt>Associated Project</dt>
                            <dd>{{$task['project_title']}}</dd>
                            <dt>Task Name</dt>
                            <dd>{{$task['task_title']}}</dd>
                            <dt>Task Description</dt>
                            <dd>{{$task['task_description']}}</dd>
                            <dt>Assigned by</dt>
                            <dd>{{$task['modified_by'] = $task['name'].' '.$task['last_name']}}</dd>
                            <dt>Created At</dt>
                            <dd>{{$task['created_at']}}</dd>
                            <dt>Due Date</dt>
                            <dd>{{$task['due_date']}}</dd>
                        </dl>
                    </div>
                    {{--modal-body-end--}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

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