@extends('dashboard.main')

@section('content')
    @include('dashboard.partials.error_validation')
    <section class="content-header">
        <h1>
            Social
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Social</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Social</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <div class="col-md-12">
                            <h3 class="box-title">Post to social Media</h3>
                            <hr>
                        </div>

                        <a class="btn btn-social btn-facebook" href="{{http('/redirect')}}">
                            <i class="fa fa-facebook"></i> Sign in to Facebook
                        </a>
                        <a class="btn  btn-social btn-twitter">
                            <i class="fa fa-twitter"></i> Sign in to Twitter
                        </a>
                        <small style="font-style:italic; margin-left: 1%;">Please make sure to sign in to the accounts
                            you want to publish posts
                        </small>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection