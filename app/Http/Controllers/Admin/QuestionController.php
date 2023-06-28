<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Models\ClosedQuestion;
use App\Models\OpenQuestion;
use App\Http\Requests\StoreClosedQuestionRequest;
use App\Http\Requests\UpdateClosedQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreClosedQuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->storeQuestion($request);
        Session::flash('message', 'Question Added successfully');
        return redirect()->back();
    }


    private function storeQuestion(Request $request): void
    {

        if ($request->input('question_type') == 'discussion') {
            OpenQuestion::create([
                'section_id' => $request->input('question_section_id'),
                'question' => $request->input('question')
            ]);
        }

        if ($request->input('question_type') == 'close_ended') {
            ClosedQuestion::create([
                'section_id' => $request->input('question_section_id'),
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




    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateClosedQuestionRequest $request
     * @param \App\Models\ClosedQuestion $closedQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClosedQuestionRequest $request, ClosedQuestion $closedQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ClosedQuestion $closedQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClosedQuestion $closedQuestion)
    {
        //
    }
}
