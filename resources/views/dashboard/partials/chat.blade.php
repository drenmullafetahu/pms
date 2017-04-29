<?php $users = $usersModel->getAuthUsers(Auth::user()->id);?>
<?php $chats = $chatsModel->chatDetails();
$reg_exUrl = "/(http|https|ftp|ftps|www)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
?>
<span id="user1" style="display:none">{{Auth::user()->id}}</span>
<span id="user1-name" style="display:none">{{Auth::user()->name}}</span>
<span id="user1-img" style="display:none">{{Auth::user()->img_src}}</span>



@foreach($users as $user)
    <div id="chat{{$user['id']}}" style="display: none; position: fixed; bottom: 0; right:0; width: 20%; z-index: 100"
         class="qeti{{$user['id']}}">
        <div id="chat-box{{$user['id']}}" style=" margin-bottom: 0;"
             class="box box-warning direct-chat direct-chat-warning chati">
            <div class="box-header with-border">
                <h3 class="box-title">{{$user['name']}}</h3>
                <span id="receiver-name{{$user['id']}}" style="display:none">{{$user['name']}}</span>
                <span id="receiver-img{{$user['id']}}" style="display:none">{{$user['img_src']}}</span>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                    <button type="button" onclick="close_popup({{$user['id']}})" class="btn btn-box-tool"><i
                                class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="height: 400px">
                <!-- Conversations are loaded here -->
                <div id="direct-chat-messages{{$user['id']}}" class="direct-chat-messages a"
                     style="height: 100%; overflow-x: hidden">
                    <?php $chatHistory = $chatMessagesModel->retrieveChatHistory(Auth::user()->id, $user['id']); ?>

                    @foreach($chatHistory as $history)
                    @if ($history['sender_username'] == Auth::user()->id)
                            <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">{{Auth::user()->name}}</span>
                            <span class="direct-chat-timestamp pull-left">{{\Carbon\Carbon::parse($history['created_at'])->diffForHumans()}}</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img"
                             src="{{('../public/user_profile_pictures/').Auth::user()->img_src}}"
                             alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            <?php
                            $text = $history['message'];
                            // Check if there is a url in the text
                            if (preg_match($reg_exUrl, $text, $url)) {
                                // make the urls hyper links
                                echo preg_replace($reg_exUrl, '<a href="' . $url[0] . '" rel="nofollow">' . $url[0] . '</a>', $text);

                            } else {
                                // if no urls in the text just return the text
                                echo $history['message'];
                            }
                            ?>

                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                    @else
                            <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{$user['name']}}</span>
                            <span class="direct-chat-timestamp pull-right">{{\Carbon\Carbon::parse($history['created_at'])->diffForHumans()}}</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{('../public/user_profile_pictures/').$user['img_src']}}"
                             alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            <?php
                            $text = $history['message'];
                            // Check if there is a url in the text
                            if (preg_match($reg_exUrl, $text, $url)) {
                                // make the urls hyper links
                                echo preg_replace($reg_exUrl, '<a href="' . $url[0] . '" rel="nofollow">' . $url[0] . '</a>', $text);

                            } else {
                                // if no urls in the text just return the text
                                echo $history['message'];
                            }
                            ?>

                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                    @endif


                    @endforeach
                            <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts" style="height: 400px">
                    <ul class="contacts-list">
                        <li>
                            <a href="#">
                                <img class="contacts-list-img"
                                     src="{{ http_resources('/vendor/dist/img/user1-128x128.jpg') }}" alt="User Image">

                                <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                    </ul>
                    <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">


                <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
                <div class="input-group">
                    <input type="text" id="text{{$user['id']}}" autofocus name="message" placeholder="Type Message ..."
                           class="form-control">
                      <span class="input-group-btn">
                        <button type="button" onclick="sendMessage({{$user['id']}})" class="btn btn-warning btn-flat">
                            Send
                        </button>
                      </span>
                </div>

            </div>
            <!-- /.box-footer-->
        </div>
        <!--/.direct-chat -->
    </div>

@endforeach

