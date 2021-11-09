<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
            data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="{{route('home.index')}}"><b>
                    <!--This is dark logo icon--><img src="{{asset('images/logo-icon.png')}}" alt="home"
                        class="dark-logo" />
                    <!--This is light logo icon--><img src="{{asset('images/logo-icon.png')}}" alt="home"
                        class="light-logo" />
                </b><span class="hidden-xs">
                    <!--This is dark logo text--><img src="{{asset('images/logo-text.png')}}" alt="home"
                        class="dark-logo" />
                    <!--This is light logo text--><img src="{{asset('images/logo-text.png')}}" alt="home"
                        class="light-logo" />
                </span></a></div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i
                        class="icon-arrow-left-circle ti-menu"></i></a></li>
            <li>

        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            @include('providers.partials.notifications')
            <!-- /.dropdown -->


            <li class="right-side-toggle"> <a class="waves-effect waves-light"
                    href="javascript:void(0)">{{$user->name}}</a></li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">

                <ul class="dropdown-menu animated flipInY">
                    <li><a href="{{route('provider.profile')}}"><i class="ti-user"></i> Profile</a></li>
                    <li><a href="{{route('provider.payment.index')}}"><i class="ti-wallet"></i> Payments</a></li>
                    <li><a href="{{route('provider.chat.index')}}"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                            Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>


            <li><a href="{{route('provider.index')}}" class="waves-effect active"><i
                        class="fa fa-circle-o text-info"></i> <span class="hide-menu">Dashboard</span></a></li>
            <li><a href="{{route('provider.job.create')}}" class="waves-effect"><i class="fa fa-circle-o text-info"></i>
                    <span class="hide-menu">Create Job Post</span></a></li>
            <li><a href="{{route('provider.job.index')}}" class="waves-effect"><i class="fa fa-circle-o text-info"></i>
                    <span class="hide-menu">Jobs</span></a></li>
            <li><a href="{{route('provider.profile')}}" class="waves-effect"><i class="fa fa-circle-o text-info"></i>
                    <span class="hide-menu">Profile</span></a></li>
            <li><a href="{{route('provider.chat.index')}}" class="waves-effect"><i class="fa fa-circle-o text-info"></i>
                    <span class="hide-menu">Inbox</span></a></li>
            <li><a href="{{route('provider.payment.index')}}" class="waves-effect"><i
                        class="fa fa-circle-o text-info"></i> <span class="hide-menu">Payments</span></a></li>
            <li><a href="#" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span
                        class="hide-menu">Nurses<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{route('provider.nurses.requests')}}">Connection Requests</a> </li>
                    <li> <a href="{{route('provider.nurses.connections')}}">Connections</a> </li>
                    <li> <a href="{{route('provider.nurses.hired')}}">Hired</a> </li>
                    <li> <a href="{{route('provider.nurses.declined')}}">Declined</a> </li>
                </ul>
            </li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();"
                    class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span
                        class="hide-menu">Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>