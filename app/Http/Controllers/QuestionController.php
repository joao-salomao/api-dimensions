<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dimensions = $request->get('dimensions', "");
        $dimensions = explode(',', $dimensions);
        $dimensions = array_filter($dimensions);

        $questions = Question::with('dimension')
            ->when($dimensions, function ($query) use ($dimensions) {
                $query->whereIn('dimension_id', $dimensions);
            });
        return response()->json($questions->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $question = Question::create($data);
        return response()->json($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->load('dimension');
        return response()->json($question);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $data = $request->all();
        $question->fill($data)->save();
        return response()->json($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        return response()->json(['deleted' => $question->delete()]);
    }
}
