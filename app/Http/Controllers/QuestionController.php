<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{

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


    public function store(CreateQuestionRequest $request)
    {
        $data = $request->all();
        $question = Question::create($data);
        return response()->json($question);
    }


    public function show(Question $question)
    {
        $question->load('dimension');
        return response()->json($question);
    }


    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $data = $request->all();
        $question->fill($data)->save();
        return response()->json($question);
    }


    public function destroy(Question $question)
    {
        return response()->json(['deleted' => $question->delete()]);
    }
}
