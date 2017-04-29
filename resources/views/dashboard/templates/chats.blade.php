<!DOCTYPE html>
<html>
<head>
    <title>Chats</title>
    <link href="{{ http_resources('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ http_resources('/vendor/dist/css/chats.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ http_resources('/vendor/dist/css/AdminLTE.min.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ http_resources('/vendor/dist/css/skins/_all-skins.min.css') }}">

</head>
<body>
<?php
$chatHistory = $chatMessagesModel->retrieveChatHistory();
?>
{{--<div class="col-md-3" >--}}
{{--<!-- DIRECT CHAT WARNING -->--}}
<div class="box box-warning direct-chat direct-chat-warning">
    <div class="box-header with-border">
        <h3 class="box-title" id="username">{{$username}}</h3>

        <div class="box-tools pull-right">
            <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                    data-widget="chat-pane-toggle">
                <i class="fa fa-comments"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages">
            @foreach($chatHistory as $history)
            {{$history['message']}}
            @endforeach

                    <!-- /.direct-chat-msg -->
        </div>
        <!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts">
            <ul class="contacts-list">
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="{{ http_resources('/vendor/dist/img/user1-128x128.jpg') }}"
                             alt="User Image">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list -->
        </div>
        <!-- /.direct-chat-pane -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

        {{--<div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>--}}
        {{--<div class="input-group">--}}
        {{--<input type="text"  id="text" autofocus="" onblur="notTyping()" name="message" placeholder="Type Message ..." class="form-control">--}}
        {{--<span class="input-group-btn">--}}
        {{--<button type="button"   class="btn btn-warning btn-flat">Send</button>--}}
        {{--</span>--}}
        {{--</div>--}}

    </div>
    <!-- /.box-footer-->
</div>
<!--/.direct-chat -->
</div>
<!-- /.col -->

{{--<div class="col-lg-4 col-lg-offset-4">--}}
{{--<h1 id="greeting">Hello, <span id="username">{{$username}}</span></h1>--}}

{{--<div id="chat-window" class="col-lg-12">--}}

{{--</div>--}}

{{--<div class="col-lg-12">--}}
{{--<div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>--}}
{{--<input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">--}}
{{--<input id="text" type="hidden" name="_token">--}}
{{--</div>--}}

{{--</div>--}}

<script src="{{ http_resources('/vendor/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
{{--<script src="{{ http_resources('/vendor/dist/js/chats.js') }}"></script>--}}
<!-- Bootstrap 3.3.6 -->
<script src="{{ http_resources('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll -->
<script src="{{ http_resources('/vendor/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

<!-- FastClick -->
<script src="{{ http_resources('/vendor/plugins/fastclick/fastclick.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{ http_resources('/vendor/dist/js/app.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ http_resources('/vendor/dist/js/demo.js') }}"></script>

</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />--}}
{{--<title></title>--}}

{{--<!-- Loading the jScrollPane CSS, along with the styling of the--}}
{{--chat in chat.css and the rest of the page in page.css -->--}}

{{--<link rel="stylesheet" type="text/css" href="{{ http_resources('/vendor/dist/css/jsScrollPane.css') }}" />--}}

{{--<link rel="stylesheet" type="text/css" href="{{ http_resources('/vendor/dist/css/page.css') }}" />--}}

{{--<link rel="stylesheet" type="text/css" href="{{ http_resources('/vendor/dist/css/chat.css') }}" />--}}


{{--</head>--}}

{{--<body>--}}

{{--<div id="chatContainer">--}}

{{--<div id="chatTopBar" class="rounded"></div>--}}
{{--<div id="chatLineHolder"></div>--}}

{{--<div id="chatUsers" class="rounded"></div>--}}
{{--<div id="chatBottomBar" class="rounded">--}}
{{--<div class="tip"></div>--}}

{{--<form id="loginForm" method="post" action="">--}}
{{--<input id="name" name="name" class="rounded" maxlength="16" />--}}
{{--<input id="email" name="email" class="rounded" />--}}
{{--<input type="submit" class="blueButton" value="Login" />--}}
{{--</form>--}}

{{--<form id="submitForm" method="post" action="">--}}
{{--<input id="chatText" name="chatText" class="rounded" maxlength="255" />--}}
{{--<input type="submit" class="blueButton" value="Submit" />--}}
{{--</form>--}}

{{--</div>--}}

{{--</div>--}}

{{--<!-- Loading jQuery, the mousewheel plugin and jScrollPane, along with our script.js -->--}}

{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>--}}

{{--<script src="{{ http_resources('/vendor/dist/js/mousewheel.js') }}"></script>--}}

{{--<script src="{{ http_resources('/vendor/dist/js/jScrollPane.min.js') }}"></script>--}}
{{--<script src="{{ http_resources('/vendor/dist/js/script.js') }}"></script>--}}

{{--</body>--}}
{{--</html>--}}