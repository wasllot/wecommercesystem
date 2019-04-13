<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Chat;
use Musonza\Chat\Models\Conversation;
use Illuminate\Support\Facades\DB;


class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $conversations = Chat::conversations()->conversation->all();
        // error_log(response($conversations)); 
        return response($conversations);
    }

    public function conversationsUser(){

        $conversations = Chat::conversations()->conversation->all();
        $conversationsUser = []; 

       foreach ($conversations as $conversation){


           $users = $conversation ->users; 
 
           foreach ($users as $user) {

                if($user->id == auth()->user()->id){

                    array_push($conversationsUser, $conversation); 

                }
                
                
            } 

       }

       return response($conversationsUser); 
    }

    public function store()
    {
        $participants = [auth()->user()->id];
        $conversation = Chat::createConversation($participants);
        // error_log(response($conversation));

        return response($conversation);
    }

    public function createConversation($product_name){

        $participants = [auth()->user()->id];
        $conversation = Chat::createConversation($participants, $product_name);
        // error_log(response($conversation));

        return response($conversation);

    }

    public function participants($conversationId)
    {
        $participants = Chat::conversations()->getById($conversationId)->users;

        error_log(response($participants)); 

        return response($participants);
    }


    public function join(Request $request, Conversation $conversation)
    {
        Chat::conversation($conversation)->addParticipants(auth()->user());
        // error_log($conversation->users()); 
        return response('');
    }



    public function leaveConversation(Request $request, Conversation $conversation)
    {
        Chat::conversation($conversation)->removeParticipants(auth()->user());
        return response('');
    }

    public function getMessages(Request $request, Conversation $conversation)
    {
        $messages = Chat::conversation($conversation)->for(auth()->user())->getMessages();

        return response($messages);
    }

    public function deleteMessages(Conversation $conversation)
    {
        Chat::conversation($conversation)->for(auth()->user())->clear();
        return response('');
    }

    public function sendMessage(Request $request, Conversation $conversation)
    {
        $message = Chat::message($request->message)
                  ->from(auth()->user())
                  ->to($conversation)
                  ->send();

      // return response($message);
        broadcast(new MessageSentEvent($user, $message))->toOthers();
    }
}