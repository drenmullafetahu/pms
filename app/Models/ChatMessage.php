<?php
/**
 * Created by PhpStorm.
 * User: ParthVaidya
 * Date: 19-10-2014
 * Time: 00:27
 */
namespace Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class ChatMessage extends Model
{
    protected $fillable = ['sender_username','message','receiver','read','user1_is_typing','user2_is_typing'];

    public function chatDetails(){
        $result = objectToArray(DB::select("SELECT * From chat_messages ;
    "));
        return $result;
    }

    public function retrieveChatHistory($user1,$user2){

        $result = objectToArray(DB::select("SELECT message , sender_username , created_at From chat_messages where sender_username = $user1 and receiver = $user2 or sender_username = $user2 and receiver = $user1 ORDER BY created_at;
    "));
        return $result;
    }

    public function getUnreadMessages($user1){
        $result = objectToArray(DB::select("SELECT  message , name , img_src ,last_name ,receiver, chat_messages.created_at ,chat_messages.read From chat_messages
        inner join users
        on users.id = chat_messages.sender_username
        where receiver = $user1 and chat_messages.read=0
        ORDER by chat_messages.created_at desc
        LIMIT 1"));
        return $result;
    }


} 