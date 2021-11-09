<li class="dropdown" id="notification"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
        href="#"><i class="icon-envelope"></i>
        @if (count($user->unreadNotifications) > 0)
        <div class='notify'><span class='heartbit'></span><span class='point'></span></div>
        @endif
    </a>
    <ul class="dropdown-menu mailbox animated flipInY">
        @if (count($user->unreadNotifications ) > 0)
        <li>
            <div class="message-center">
                <ul>

                    @foreach ($user->unreadNotifications as $notification)

                    <li>
                        <div class="drop-title">{{$notification->data['data']}}</div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </li>
        @else
        <li>
            <div class="drop-title">You have

                0
                new notifications</div>
        </li>
        @endif


        <li>
            <a class="text-center" href="{{route('notifications.settings')}}"> <strong>Notification Settings</strong>
                <i class="fa fa-angle-right"></i> </a>
        </li>
    </ul>
    <!-- /.dropdown-messages -->
</li>