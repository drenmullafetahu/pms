<?php
namespace Controllers;

use App\Http\Requests;
use App\Http\Requests\AppRequest;
use Models\Chat;
use Models\ChatMessage;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Auth\Authenticatable as Auth;
use DB;
use Psy\Exception\ErrorException;
use Session;
use App\ViewShare\Dashboard as ViewShare;

class ChatController extends MainController
{

    public function sendMessage()
    {

        $username = Input::get('user1');
        $user2 = Input::get('receiver');
        $text = Input::get('data');

        $chatMessage = new ChatMessage();
        $chatMessage->sender_username = $username;
        $chatMessage->message = $text;
        $chatMessage->receiver = $user2;
        $chatMessage->save();
    }

    public function isTyping()
    {
        $username = Input::get('user1');

        $chat = ChatMessage::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = true;
        else
            $chat->user2_is_typing = true;
        $chat->save();

    }

    public function notTyping()
    {
        $username = Input::get('user1');

        $chat = ChatMessage::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = false;
        else
            $chat->user2_is_typing = false;
        $chat->save();
    }


    public function retrieveChatMessages()
    {
        $username = Input::get('user1');
        $user2 = Input::get('receiver');
        $message = ChatMessage::where('sender_username', '=', $user2)->where('receiver', '=', $username)->where('read', '=', false)->first();
        if (count($message) > 0) {
            $message->read = true;
            $message->save();
            return $message->message;
        }


    }

    public function makeSeen()
    {
        $username = Input::get('user1');
        $user2 = Input::get('receiver');
        $message = ChatMessage::where('sender_username', '=', $user2)->where('receiver', '=', $username)->where('read', '=', false)->first();

        if (count($message) > 0) {
            $message->read = true;
            $message->save();
        }
    }

    public function retrieveChatHistory()
    {
        $user1 = Input::get('user1');
        $user2 = Input::get('receiver');
//        $history = ChatMessage::where('sender_username', '=', $user1)->where('receiver', '=', $user2)->first();
        $history = objectToArray(DB::select("SELECT message FROM `chat_messages` WHERE sender_username = $user1 and receiver = $user2
    "));
        return $history;
    }

    public function retrieveTypingStatus()
    {
        $username = Input::get('user1');

        $chat = ChatMessage::find(1);

        if ($chat->user1 == $username) {
            if ($chat->user2_is_typing)
                return $chat->user2;
        } else {
            if ($chat->user1_is_typing)
                return $chat->user1;
        }

    }
}