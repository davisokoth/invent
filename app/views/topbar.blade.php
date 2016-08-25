<div id="logo" class="col-xs-12 col-sm-2">
    <a href="{{URL::route('home')}}">NCIC iMonitor</a>
</div>
<div id="top-panel">
    <div class="pull-right">
        <a href="{{URL::route('about')}}">About this software</a>

        &nbsp; &nbsp;
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
        @if(Sentry::check())
            <?php
                $admin = Sentry::findGroupByName('SuperAdmins');
                $user = Sentry::getUser();
            ?>
            Welcome, <a href="">{{$user->first_name}}</a> |
            @if($user->inGroup($admin))
                <a href="{{URL::route('admin.home')}}">Admin Panel<a/> |
            @endif
            <a href="{{URL::route('logout')}}">Logout</a>
        @endif
        &nbsp;&nbsp;&nbsp;
        
    </div>
</div>
