<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Enrollment;

class CourseService
{

    private int $course_lessons_total = 0;
    private array $courses_to_activate = [];

    public function getCourseLecturesTotalNumber($courseID): int
    {

        $course = Course::with(['sections' => ['lectures']])->find($courseID);
        foreach ($course->sections as $section) {
            $this->course_lessons_total += $section->lectures->count();
        }
        return $this->course_lessons_total;
    }


    public function enrollUserToCourses($courses_ids, $student): void
    {
        $student_enrollments = Enrollment::where('student_id', $student->id)->get()->toArray();
        foreach ($courses_ids as $courses_id) {
            if (!in_array($courses_id, array_column($student_enrollments, 'course_id'))) {
                Enrollment::create([
                    'course_id' => $courses_id,
                    'student_id' => $student->id,
                    'progress' => 0,
                    'amount' => 0,
                    'status' => 'in_progress',
                ]);
            }
        }
    }


    public function getCoursesToActivate($request, $student): array
    {
        if (!is_null($request->courses)) {
            $this->courses_to_activate = array_map('intval', $request->courses);
            $this->enrollUserToCourses($this->courses_to_activate, $student);
        }

        return $this->courses_to_activate;
    }


}
