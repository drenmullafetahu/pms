<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mizza-Pms</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('dashboard.layout.styles')
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <meta name="theme-color" content="#f39c12"/>
</head>

<body class="sidebar-mini sidebar-collapse   ng-scope pace-done skin-yellow-light" ng-app="aplikacioni">
<div class="wrapper">
    <header class="main-header">
        @include('dashboard.partials.header')
    </header>
    <aside class="main-sidebar">
        @include('dashboard.partials.leftbar')
    </aside>

    <div class="content-wrapper">
        @include('dashboard.partials.FABspeedDial')
        @include('dashboard.partials.chat')

        @yield('content')

        @include('dashboard.layout.modals.activities.createActivities')
        @include('dashboard.layout.modals.tasks.createTasks')
        @include('dashboard.layout.modals.projects.createProjects')
    </div>
    <footer class="main-footer">
        @include('dashboard.footer')

    </footer>
    <aside class="control-sidebar control-sidebar-light">
        @include('dashboard.partials.rightbar')
    </aside>
    <div class="control-sidebar-bg"></div>
</div>
@include('dashboard.layout.scripts')

@include('dashboard.layout.custom_scripts')

</body>
</html>