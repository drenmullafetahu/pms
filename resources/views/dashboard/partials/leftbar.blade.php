<?php
if (!empty(Auth::user()->img_src)) {
    $img_src = Auth::user()->img_src;
} else {
    $img_src = ('avatar.png');
}
?>
        <!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src=" {{ ('../public/user_profile_pictures/').$img_src }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}} {{Auth::user()->last_name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{http('/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li><a href="{{http('/treeView')}}"><i class="fa fa-folder-open"></i> <span>Task Browser</span></a></li>


        @role(['owner','admin'])
        <li class="header">MANAGE</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>Manage Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{http('/projects')}}"><i class="fa fa-folder-open"></i> <span>Projects Table</span></a>
                </li>
                <li><a href="{{http('/manage/activities')}}"><i class="fa fa-folder-open"></i>
                        <span>Activities Table</span></a></li>
                <li><a href="{{http('/manage/tasks')}}"><i class="fa fa-tasks"></i> <span>Tasks Table</span></a></li>

            </ul>
        </li>
        @endrole
        @role('owner')
        <li><a href="{{http('/calendar')}}"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
        <li><a href="{{http('/getTree')}}"><i class="fa fa-calendar"></i> <span>Get Tree</span></a></li>
        <li><a href="{{http('/social')}}"><i class="fa fa-share-square-o"></i> <span>Post to Social Media</span></a>
        </li>
        @endrole

        @role(['owner','admin'])

        <li><a href="{{http('/task-responses')}}"><i class="fa fa-mail-reply-all"></i> <span>Task Responses</span></a>
        </li>


        @endrole

        <li class="header">Chat</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-commenting"></i> <span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                @include('dashboard.partials.contacts')
            </ul>
        </li>
        @role(['owner','admin'])
        <li class="header">ADMINISTRATION</li>
        <li><a href="{{http('/dashboard')}}"><i class="fa fa-users"></i> <span>Roles</span></a></li>
        <li><a href="{{http('/dashboard')}}"><i class="fa fa-user-times"></i> <span>Permissions</span></a></li>
        @endrole

        @role('owner')
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        @endrole
        <li class="header">Privacy Policy</li>
        <li><a href="{{http('/privacy')}}"><i class="fa fa-circle-o text-red"></i> <span>Privacy Policy</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->
