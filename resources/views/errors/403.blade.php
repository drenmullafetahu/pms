@extends('dashboard.main')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Acces is Not Allowed.</h3>

            <p>
                We are sorry <b>{{Auth::user()->name}}</b> You don't have the permission to this section
                Meanwhile, you may <a href="{{http('/dashboard')}}">return to dashboard</a> or try using the search form.
            </p>

        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
@endsection