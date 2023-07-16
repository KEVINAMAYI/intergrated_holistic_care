<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClosedQuestion;
use App\Models\OpenQuestion;
use App\Services\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{

    public function __construct(private QuestionService $questionService){}

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->questionService->storeQuestion($request);
        Session::flash('message', 'Question Added successfully');
        return redirect()->back();
    }



    public function show($questionID)
    {
        $open_ended_question = OpenQuestion::where('id', $questionID)->get();
        $closed_ended_question = ClosedQuestion::where('id', $questionID)->get();

        return response()->json([
            'discussion_question' => $open_ended_question,
            'close_ended_question' => $closed_ended_question
        ]);

    }


    /**
     * Update the specified resource in storage.
     * @param \App\Models\ClosedQuestion $closedQuestion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $questionID)
    {

        $this->questionService->updateQuestion($request, $questionID);
        session()->flash('message', 'Question Updated Successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ClosedQuestion $closedQuestion
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($questionID)
    {
        $this->questionService->deleteQuestion($questionID);
        session()->flash('message', 'Question Deleted Successfully');
        return redirect()->back();
    }
}
