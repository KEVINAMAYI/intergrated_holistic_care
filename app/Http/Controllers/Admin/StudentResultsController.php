<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClosedQuestion;
use App\Models\ClosedQuestionResults;
use App\Models\CourseCAT;
use App\Models\MarkingStatus;
use App\Models\OpenQuestion;
use App\Models\OpenQuestionResults;
use App\Models\User;
use Illuminate\Http\Request;

class StudentResultsController extends Controller
{

    public function getStudentsCourseResults($courseID)
    {

        $students_score = array();
        $open_questions = OpenQuestion::where('course_id', $courseID);
        $closed_questions = ClosedQuestion::where('course_id', $courseID);
        $total_marks = $open_questions->count() + $closed_questions->count();
        $users = User::all();

        $closed_questions_results = ClosedQuestionResults::whereIn('closed_question_id', array_column($closed_questions->get()->toArray(), 'id'))
            ->where('is_correct', 1)->get();
        $open_questions_results = OpenQuestionResults::whereIn('open_question_id', array_column($open_questions->get()->toArray(), 'id'))
            ->where('is_correct', 1)->get();


        foreach ($closed_questions_results as $closed_questions_result) {
            if (!array_key_exists($closed_questions_result->user_id, $students_score)) {
                $students_score[$closed_questions_result->user_id] = 1;
            } else {
                $students_score[$closed_questions_result->user_id] += 1;
            }
        }

        foreach ($open_questions_results as $open_questions_result) {
            if (!array_key_exists($open_questions_result->user_id, $students_score)) {
                $students_score[$open_questions_result->user_id] = 1;
            } else {
                $students_score[$open_questions_result->user_id] += 1;
            }
        }

        return view('admin.course_results.index', compact('students_score', 'total_marks', 'users', 'courseID'));
    }


    public function getStudentDiscussionQuestionResults($courseID, $studentID): \Illuminate\Http\JsonResponse
    {
        $open_questions_results = OpenQuestionResults::whereIn('open_question_id', array_column(OpenQuestion::where('course_id', $courseID)->get()->toArray(), 'id'))
            ->where('user_id', $studentID)->get();
        $open_questions_questions = OpenQuestion::where('course_id', $courseID)->get();

        return response()->json([
            'student_discussion_question_results' => $open_questions_results,
            'discussion_questions' => $open_questions_questions,
        ]);

    }

    public function storeStudentDiscussionQuestionMarkedResults(Request $request, $studentId)
    {
        foreach ($request->input('is_answer') as $question_id => $is_correct) {
            OpenQuestionResults::where('user_id', $studentId)->where('id', $question_id)->update([
                'is_correct' => $is_correct
            ]);
        }

        if(is_null(MarkingStatus::where('user_id',$studentId)->first())){
            MarkingStatus::create([
                'user_id' => $studentId,
                'status' => 'completed'
            ]);
        }

        session()->flash('message', 'Discussion Questions Marked Successfully');
        return redirect()->back();
    }
}
