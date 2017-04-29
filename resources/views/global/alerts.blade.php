
@if(Session::has("permission_created"))
 <div class="alert alert-success alert-autoclose"><em> {{ Session::get('permission_created') }}</em></div>
@elseif(Session::has('permission_updated'))
 <div class="alert alert-success alert-autoclose"><em> {{ Session::get('permission_updated') }}</em></div>
@elseif(Session::has('permission_deleted'))
 <div class="alert alert-danger alert-autoclose"><em> {{ Session::get('permission_deleted') }}</em></div>
@endif


@if(Session::has("role_created"))
 <div class="alert alert-success alert-autoclose"><em> {{ Session::get('role_created') }}</em></div>
@elseif(Session::has('role_updated'))
 <div class="alert alert-success alert-autoclose"><em> {{ Session::get('role_updated') }}</em></div>
@elseif(Session::has('role_deleted'))
 <div class="alert alert-danger alert-autoclose"><em> {{ Session::get('role_deleted') }}</em></div>
@endif


@if(Session::has("user_created"))
 <div class="alert alert-success alert-autoclose"><em> {{ Session::get('user_created') }}</em></div>
@elseif(Session::has('user_updated'))
 <div class="alert alert-success alert-autoclose"><em> {{ Session::get('user_updated') }}</em></div>
@elseif(Session::has('user_deleted'))
 <div class="alert alert-danger alert-autoclose"><em> {{ Session::get('user_deleted') }}</em></div>
@endif