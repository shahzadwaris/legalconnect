<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
            data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="index.php"><b>
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

            <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i
                        class="icon-envelope"></i>


                </a>
                <ul class="dropdown-menu mailbox animated flipInY">
                    <li>
                        <div class="drop-title">You have

                            0
                            new notifications</div>
                    </li>
                    <li>
                        <div class="message-center">
                        </div>
                    </li>
                    <li>
                        <a class="text-center" href="notification-settings.php"> <strong>Notification Settings</strong>
                            <i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->

            <!-- /.dropdown -->

            <li class="right-side-toggle"><a class="waves-effect waves-light"
                    href="javascript:void(0)">{{$user->name}}</a>
            </li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-static-side -->
</nav>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">

                <ul class="dropdown-menu animated flipInY">
                    <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="earnings.php"><i class="ti-wallet"></i> Earnings</a></li>
                    <li><a href="inbox.php"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>