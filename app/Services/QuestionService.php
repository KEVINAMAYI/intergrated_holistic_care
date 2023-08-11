<?php

namespace App\Services;

use App\Models\ClosedQuestion;
use App\Models\OpenQuestion;
use App\Models\Section;
use Illuminate\Http\Request;

class QuestionService
{


    public function storeQuestion(Request $request): void
    {

        if ($request->input('question_type') == 'discussion') {
            OpenQuestion::create([
                'section_id' => $request->input('question_section_id'),
                'question' => $request->input('question'),
                'question_label' => $request->input('question_label'),
                'course_id' => Section::find($request->input('question_section_id'))->course->id
            ]);
        }

        if ($request->input('question_type') == 'close_ended') {
            ClosedQuestion::create([
                'section_id' => $request->input('question_section_id'),
                'question' => $request->input('question'),
                'question_label' => $request->input('question_label'),
                'course_id' => Section::find($request->input('question_section_id'))->course->id,
                'options' => [
                    'a' => $request->input('answers')[0],
                    'b' => $request->input('answers')[1],
                    'c' => $request->input('answers')[2],
                    'd' => $request->input('answers')[3],
                    'is_answer' => $request->input('is_answer')[0],
                ]
            ]);
        }

    }


    public function updateQuestion($request, $questionID)
    {
        if ($request->input('question_type') == 'discussion') {
            OpenQuestion::where('id', $questionID)->update([
                'question' => $request->input('question')
            ]);
        }

        if ($request->input('question_type') == 'close_ended') {
            ClosedQuestion::where('id', $questionID)->update([
                'question' => $request->input('question'),
                'options' => [
                    'a' => $request->input('answers')[0],
                    'b' => $request->input('answers')[1],
                    'c' => $request->input('answers')[2],
                    'd' => $request->input('answers')[3],
                    'is_answer' => $request->input('is_answer')[0],
                ]
            ]);
        }
    }


    public function deleteQuestion($questionID)
    {

        $open_ended_question = OpenQuestion::where('id', $questionID);
        $closed_ended_question = ClosedQuestion::where('id', $questionID);

        if ($open_ended_question->exists()) {
            $open_ended_question->delete();
        }

        if ($closed_ended_question->exists()) {
            $closed_ended_question->delete();
        }
    }

}
