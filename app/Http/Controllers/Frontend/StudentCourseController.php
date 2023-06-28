<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClosedQuestion;
use App\Models\ClosedQuestionResults;
use App\Models\Course;
use App\Models\OpenQuestion;
use App\Models\OpenQuestionResults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class StudentCourseController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::all();
        return view('frontend.courses', compact('courses'));
    }

    public function takeLessons(Course $course): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if (!Gate::allows('access_course', $course->id)) {
            abort(403);
        }
        return view('frontend.take_lessons', compact('course'));
    }


    public function makeCoursePayment($courseId): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if (!Gate::allows('access_course', $courseId)) {
            abort(403);
        }
        return view('frontend.student_course_payments', compact('courseId'));
    }


    public function getSectionQuestions($section_id): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'open_ended_questions' => OpenQuestion::where('section_id', $section_id)->get(),
            'closed_ended_questions' => ClosedQuestion::where('section_id', $section_id)->get()
        ]);

    }

    public function storeUserResults(Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->has('closed_question_answers') && !in_array(null, $request->input('closed_question_answers'))) {
            $this->clearUsersClosedQuestionsResults($request);
            DB::table('closed_question_results')->insert($this->getUserCloseQuestionsResults($request));
            Session::flash('message', 'Answers Submitted successfully');
        }

        if ($request->has('open_ended_answers') && !in_array(null, $request->input('open_ended_answers'))) {
            $this->clearUsersOpenQuestionsResults($request);
            DB::table('open_question_results')->insert($this->getOpenEndedQuestionsResults($request));
            Session::flash('message', 'Answers Submitted successfully');
        }

        return redirect()->back();
    }

    private function getOpenEndedQuestionsResults($request)
    {

        $user_open_questions_results = array();
        foreach ($request->input('open_ended_answers') as $question => $answer) {
            $user_open_questions_results[] = [
                'user_id' => auth()->user()->id,
                'open_question_id' => $question,
                'answer' => $answer
            ];
        }

        return $user_open_questions_results;
    }


    private function getUserCloseQuestionsResults($request): array
    {

        $user_closed_questions_results = array();
        $closed_questions = ClosedQuestion::where('section_id', $request->input('section_id'))->get();
        foreach ($closed_questions as $closed_question) {
            foreach ($request->input('closed_question_answers') as $question => $chosen_answer) {

                if ($closed_question->id == $question) {
                    if ($closed_question->options['is_answer'] == $chosen_answer) {
                        $user_closed_questions_results[] = [
                            'user_id' => auth()->user()->id,
                            'closed_question_id' => $closed_question->id,
                            'is_correct' => 1
                        ];
                    } else {
                        $user_closed_questions_results[] = [
                            'user_id' => auth()->user()->id,
                            'closed_question_id' => $closed_question->id,
                            'is_correct' => 0
                        ];
                    }
                }

            }
        }

        return $user_closed_questions_results;
    }


    private function clearUsersClosedQuestionsResults($request)
    {
        ClosedQuestionResults::whereIn('closed_question_id', array_keys($request->input('closed_question_answers')))
            ->where('user_id', auth()->user()->id)->delete();
    }

    private function clearUsersOpenQuestionsResults($request)
    {
        OpenQuestionResults::whereIn('open_question_id', array_keys($request->input('open_ended_answers')))
            ->where('user_id', auth()->user()->id)->delete();
    }
}
