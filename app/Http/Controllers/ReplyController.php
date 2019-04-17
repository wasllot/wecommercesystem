<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\Question;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ReplyResource;
use App\Notifications\NewReplyNotification;
use App\Events\DeleteReplyEvent;

class ReplyController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
		// $this->middleware('auth');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug, $productId, $questionId)
    {
        $question = Question::findOrFail($questionId); 
        return ReplyResource::collection($question->replies);
    }

    public function indexBackend($questionId)
    {
        $question = Question::findOrFail($questionId); 


        return ReplyResource::collection($question->replies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($questionId, Request $request)
    {

        $question = Question::find($questionId); 

        $reply = $question->replies()->create($request->all());

        $user = $question->user;

        // if ($reply->user_id !== $question->user_id) {

        //     $user->notify(new NewReplyNotification($reply));
        // }
        Session::flash('flash_message', '¡Respuesa creada correctamente!');
        
        return response(['reply' => new ReplyResource($reply)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response('Update', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        broadcast(new DeleteReplyEvent($reply->id))->toOthers();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
