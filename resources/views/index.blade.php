@extends('layouts.master')

@section('content')
<!-- Page Content -->
<!-- Chat layout and demo functionality is initialized in js/pages/be_comp_chat.js -->
<!--
                    You can use the following JS function to add a header message to a chat window:
                    BeCompChat.addHeader(chatId, chatMsg)

                    chatId         : the data-chat-id attribute of the chat window
                    chatMsg        : the header message you would like to add

                    You can use the following JS function to add a message to a chat window:
                    BeCompChat.addMessage(chatId, chatMsg, chatMsgLevel)

                    chatId         : the data-chat-id attribute of the chat window
                    chatMsg        : the message you would like to add
                    chatMsgLevel   : 'self' the user sends the message, '' empty if the user receives the message (changes its style)
                -->
<div class="js-chat-container content content-full invisible" data-toggle="appear" data-chat-height="350">
    <div class="row">
       
        <div class="col-md-12">
            <!-- Single Chat #4 -->
            <div class="block block-rounded block-themed">
                <!-- Chat Header -->
                <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-sea text-center">
                    <img class="img-avatar img-avatar-thumb" src="/img/avatars/avatar1.jpg" alt="">
                    <div class="font-w600 mt-15 mb-5 text-white">
                        {{ auth()->user()->name}}
                    </div>
                </div>
                <!-- END Chat Header -->

                <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
                <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto"
                    data-chat-id="4"></div>

                <!-- Chat Input -->
                <div class="js-chat-form block-content block-content-full block-content-sm bg-body-light">
                    <form action="be_comp_chat_single.html" method="post">
                        <input class="js-chat-input form-control" type="text" data-target-chat-id="4"
                            placeholder="متن پیام را اینجا بنویسید..">
                    </form>
                </div>
                <!-- END Chat Input -->
            </div>
            <!-- END Single Chat #4 -->
            <button id="leave" class="btn btn-alt-danger">اتمام چت</button>
        </div>
        
    </div>
</div>
<!-- END Page Content -->
@endsection

@section('scripts')
    <!-- Page JS Code -->
    <script>
        var userID = '{{ auth()->user()->id }}';
        Echo.private('chat')
        .listenForWhisper('message', (e) => {
            // console.log(e);
            BeCompChat.addMessage(4, e.text);
            
        });

        $('#leave').click( function() {
            $('.js-chat-input').prop('disabled', true);
            Echo.leave('chat');
        });

    </script>
    <script src="/js/pages/be_comp_chat.js"></script>

@endsection