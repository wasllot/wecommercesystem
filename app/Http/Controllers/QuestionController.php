<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;




class QuestionController extends Controller
{

    	public function __construct()
	{
		// $this->middleware('auth');
	}

	    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
        // return QuestionResource::collection($product->questions);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        // $question = auth()->user()->question()->create($request->all());
         
        $question = Question::create($request->all());
        Session::flash('flash_message', '¡Pregunta creada correctamente!');
        return response(new QuestionResource($question), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {

        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('Update', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // error_log($id);
        $question = Question::findOrFail($id)->delete();
        Session::flash('flash_message', '¡Pregunta eliminada correctamente!');
        return response(null, Response::HTTP_NO_CONTENT);
    }

}
