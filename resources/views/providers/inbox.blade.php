@extends('layouts.provider')
@section('contents')
<div id="wrapper">
    @include('providers.partials.sidebar')

    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Inbox</h4>
                </div>
                {{-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="new-job.php" target="_blank"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                        Job Post</a>
                </div> --}}
            </div>
            <!-- /.row -->

            <!-- .chat-row -->
            <div class="chat-main-box">
                <!-- .chat-left-panel -->
                <div class="chat-left-aside">
                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                    <div class="chat-left-inner">
                        <ul class="chatonline style-none ">
                            <li><a> <span> Conversations </span></a></li>
                            @if (count($contacts) > 0)
                            @foreach ($contacts as $contact)
                            <li><a href="{{route('provider.chat.show', $contact->id)}}">
                                    <span>{{$contact->nurse->username}}<small>{{$contact->lastMessage->message}}</small></span></a>
                            </li>
                            @endforeach
                            @endif



                            <hr>
                            <li class="p-20"></li>
                        </ul>
                    </div>
                </div>
                <!-- .chat-left-panel -->



                <!-- .chat-right-panel -->
                <div class="chat-right-aside" id="yourDiv">
                    <div class="chat-main-header">
                        <div class="p-20 b-b">
                            <h3 class="box-title">
                                Select a conversation
                            </h3>
                        </div>
                    </div>
                    <div class="chat-box">
                        <ul class="chat-list slimscroll p-t-30">
                            @if (count($messages) > 0)
                            @foreach ($messages as $message)
                            @if ($message->sender == $user->id)

                            <li class='odd'>
                                <div class='chat-image'> </div>
                                <div class='chat-body'>
                                    <div class='chat-text'>
                                        <h4>{{$message->senderUser->username}}</h4>
                                        <p> {{$message->message}} </p>
                                        <b>{{$message->created_at->format('M d, Y H:i')}}</b>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li>
                                <div class='chat-image'> </div>
                                <div class='chat-body'>
                                    <div class='chat-text'>
                                        <h4>{{$message->receiverUser->username}}</h4>
                                        <p> {{$message->message}} </p>
                                        <b>{{$message->created_at->format('M d, Y H:i')}}</b>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endforeach
                            @else
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            @endif
                        </ul>

                        <div class="row send-chat-box">
                        </div>
                    </div>
                </div>
                <!-- .chat-right-panel -->






                <!-- .chat-right-panel -->
                <div class="chat-right-aside">

                    <div class="chat-box">

                        <div class="row send-chat-box">
                            <div class="col-sm-12">








                            </div>
                        </div>
                    </div>
                </div>
                <!-- .chat-right-panel -->




                <a name='bottom'></a>

            </div>
            <!-- /.chat-row -->







        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> {{date('Y')}} &copy; Legal Connect . <a
                href="mailto:contact@medconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection