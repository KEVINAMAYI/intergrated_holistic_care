<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\EnrollmentLesson;
use App\Models\Lecture;
use App\Models\Section;

class CourseService
{

    private int $course_lesson_total = 0;

    public function getCourseLecturesTotalNumber($courseID) : int
    {

        $course = Course::with(['sections' => ['lectures']])->find($courseID);
        foreach ($course->sections as $section) {
                $this->course_lesson_total += $section->lectures->count();
            }
        return $this->course_lesson_total;
    }


}
