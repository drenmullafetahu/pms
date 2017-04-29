<div id="notifications" class="animated bounceInRight"
     style="cursor: pointer;
    position: fixed;
    right: 0px;
    z-index: 9999;
    bottom: 0px;
    margin-bottom: 22px;
    margin-right: 15px;
    max-width: 300px;
    animation-delay: 0.02s; ">
    @if (count($errors) > 0)
        <div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-exclamation-circle text-red"></i> Oops ! an error occured </br> while saving
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    @endif
</div>

