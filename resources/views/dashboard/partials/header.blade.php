<?php
$img_src = Auth::user()->img_src;
?>
        <!-- Logo -->
<a href="{{http('/dashboard')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>M</b>P</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Mizza</b>-Pms</span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            @role('owner')
                    <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- start message -->
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{ http_resources('/vendor/dist/img/user2-160x160.jpg') }}"
                                             class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <!-- end message -->
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{ http_resources('/vendor/dist/img/user3-128x128.jpg') }}"
                                             class="img-circle" alt="User Image">

                                    </div>
                                    <h4>
                                        AdminLTE Design Team
                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{ http_resources('/vendor/dist/img/user4-128x128.jpg') }}"
                                             class="img-circle" alt="User Image">

                                    </div>
                                    <h4>
                                        Developers
                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{ http_resources('/vendor/dist/img/user3-128x128.jpg') }}"
                                             class="img-circle" alt="User Image">

                                    </div>
                                    <h4>
                                        Sales Department
                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="{{ http_resources('/vendor/dist/img/user4-128x128.jpg') }}"
                                             class="img-circle" alt="User Image">

                                    </div>
                                    <h4>
                                        Reviewers
                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            @endrole

            <?php $messages = $chatMessagesModel->getUnreadMessages(Auth::user()->id);?>
            <li class="dropdown messages-menu closed">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    @if(!empty($messages))
                        @foreach($messages as $message)
                            <li>
                                <!-- inner menu: contains the actual data -->

                                <div class="slimScrollDiv"
                                     style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                    <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{('../public/user_profile_pictures/').$message['img_src']}}"
                                                         class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    {{$message['name']. ' ' .$message['last_name']}}
                                                    <small>
                                                        <i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}
                                                    </small>
                                                </h4>
                                                <p>{{$message['message']}}</p>
                                            </a>
                                        </li>
                                        <!-- end message -->

                                    </ul>
                                    <div class="slimScrollBar"
                                         style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 131.148px;"></div>
                                    <div class="slimScrollRail"
                                         style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <?php $rejected = $taskRejectsModel->getPersTaskRejected(Auth::user()->id);?>
            <?php $rejectedCount = $taskRejectsModel->getPersTaskRejectedCount(Auth::user()->id);?>

            @foreach($rejectedCount as $rejectedTaskCount)
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bullhorn"></i>
                        <span class="label label-danger">{{$rejectedTaskCount['count']}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><i class="fa fa-warning text-danger"></i> You
                            have {{$rejectedTaskCount['count']}} Rejections
                        </li>
                        @endforeach
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu animated fadeInDown">
                                @foreach($rejected as $rejectedTask)
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ ('../public/user_profile_pictures/').$rejectedTask['img_src']}}"
                                                     class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                {{ucfirst($rejectedTask['task_title'])}}
                                                <small>
                                                    <i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($rejectedTask['created_at'])->diffForHumans()}}
                                                </small>
                                            </h4>
                                            <p><?php $in = ucfirst($rejectedTask['comment']);
                                                echo $shortDesc = strlen($in) > 50 ? substr($in, 0, 30) . "..." : $in;?>
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <?php $taskDetailsToDo = $tasksModel->getPersonalizedTasks_ToDo(Auth::user()->id);?>
                <?php $taskDetailsDoing = $tasksModel->getPersonalizedTasks_Doing(Auth::user()->id);?>
                <?php $taskDetailsPending = $tasksModel->getPersonalizedTasks_Pending(Auth::user()->id);?>
                <?php $taskCount = $tasksModel->getPersTaskCount(Auth::user()->id);?>
                @foreach($taskCount as $task)
                    <li class="dropdown tasks-menu " id="tasks-menu">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">{{$task['count']}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have {{$task['count']}} tasks in total</li>
                            @endforeach
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu animated fadeInDown">
                                    @foreach($taskDetailsToDo as $task)
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    {{ucfirst($task['task_title'])}}
                                                    <small class="pull-right">{{$task['status_title']}}</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 0%"
                                                         role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <span class="sr-only">0% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                                <!-- end task item To Do -->
                                        <hr/>
                                        @foreach($taskDetailsDoing as $task)
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        {{ucfirst($task['task_title'])}}
                                                        <small class="pull-right">{{$task['status_title']}}</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 50%"
                                                             role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                            <span class="sr-only">50% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                        <hr/>
                                        @foreach($taskDetailsPending as $task)
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        {{ucfirst($task['task_title'])}}
                                                        <small class="pull-right">{{$task['status_title']}}</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 90%"
                                                             role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                            <span class="sr-only">90% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="{{http('/profile')}}">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ ('../public/user_profile_pictures/').$img_src }}" class="user-image"
                                 alt="User Image">

                            <span class="hidden-xs">{{Auth::user()->name}} {{Auth::user()->last_name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ ('../public/user_profile_pictures/').$img_src }}" class="img-circle"
                                     alt="User Image">

                                <p>
                                    {{Auth::user()->name}} {{Auth::user()->last_name}} - {{Auth::user()->profession}}
                                    <small>Member since {{Auth::user()->created_at->diffForHumans()}}</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{http('/profile')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{http('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
        </ul>
    </div>

</nav>
