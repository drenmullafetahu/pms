<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teamo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ http_resources('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="{{ http_resources('/vendor/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ http_resources('/vendor/plugins/iCheck/square/blue.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
$routeLanguage = (isMultilingual()) ? '/' . appLanguage() : '/';
?>

<body class="hold-transition login-page"
      style="background-image: url('{{ http_resources('/vendor/dist/img/Huge-Backgrounds-53.jpg')}}');">
@include('dashboard.partials.error_validation')
<div class="login-box">
    <div class="login-logo">
        <a href="./login" style="color: #70625c;"><b style="color: #dcdcdc;">Mizza</b>Pms </a>
        <a style="text-align: left;font-size: 13px;color: #c7c4c4;">Your Project Management System</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {!! Form::open(['url' => $routeLanguage.('/handleLogin'), 'method' => 'post']) !!}
        <div class="form-group has-feedback">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control' ,'placeholder'=>'Password']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        {!! Form::token()!!}
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
        {{--</form>--}}
        {!! Form::close() !!}

        <a href="#">I forgot my password</a><br>
        <a href="..{{$routeLanguage}}/register" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{ http_resources('/vendor/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ http_resources('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ http_resources('/vendor/plugins/iCheck/icheck.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ http_resources('/vendor/plugins/iCheck/icheck.min.js') }}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
