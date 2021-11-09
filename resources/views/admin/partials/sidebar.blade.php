<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
            data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="{{route('admin.index')}}"><b>
                    <!--This is dark logo icon--><img src="{{asset('images/logo-icon-provider.png')}}" alt="home"
                        class="dark-logo" />
                    <!--This is light logo icon--><img src="{{asset('images/logo-icon-provider.png')}}" alt="home"
                        class="light-logo" />
                </b><span class="hidden-xs">
                    <!--This is dark logo text--><img src="{{asset('images/logo-text-provider.png')}}" alt="home"
                        class="dark-logo" />
                    <!--This is light logo text--><img src="{{asset('images/logo-text-provider.png')}}" alt="home"
                        class="light-logo" />
                </span></a></div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i
                        class="icon-arrow-left-circle ti-menu"></i></a></li>
            <li>


        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown"> <b class="hidden-xs">Admin</b> </a>
                <!-- /.dropdown-user -->
            </li>
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
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="user-pro">
                <a href="#" class="waves-effect"> <span class="hide-menu"></span>
                </a>
            </li>
            <li><a href="{{route('admin.index')}}" class="waves-effect active"><i class="ti-dashboard p-r-10"></i> <span
                        class="hide-menu">Dashboard</span></a></li>

            <li><a href="{{route('admin.jobs.index')}}" class="waves-effect"><i class="icon-menu p-r-10"></i> <span
                        class="hide-menu">Jobs</span></a></li>

            <li><a href="{{route('admin.providers.index')}}" class="waves-effect"><i class="icon-menu p-r-10"></i> <span
                        class="hide-menu">Medical Providers</span></a></li>

            <li><a href="{{route('admin.nurses.index')}}" class="waves-effect"><i class="icon-menu p-r-10"></i> <span
                        class="hide-menu">Nurses</span></a></li>

            <li><a href="{{route('admin.conversation.index')}}" class="waves-effect"><i class="icon-menu p-r-10"></i>
                    <span class="hide-menu">Conversations</span></a></li>

            <li><a href="{{route('admin.payments.index')}}" class="waves-effect"><i class="icon-menu p-r-10"></i> <span
                        class="hide-menu">Payments</span></a></li>
            <li><a href="{{route('admin.create')}}" class="waves-effect"><i class="icon-menu p-r-10"></i> <span
                        class="hide-menu">Create Admin</span></a></li>
            <li><a href="#" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span
                        class="hide-menu">Pages<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="{{route('page.nurse-terms')}}">Nurse Terms & Condition</a> </li>
                    <li> <a href="{{route('page.mpTerms')}}">MP Terms & Condition</a> </li>
                </ul>
            </li>

            <!-- <li><a href="withdrawals.php" class="waves-effect"><i class="icon-menu p-r-10"></i> <span class="hide-menu">Withdrawals</span></a></li> -->

            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
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
<!-- Left navbar-header end -->