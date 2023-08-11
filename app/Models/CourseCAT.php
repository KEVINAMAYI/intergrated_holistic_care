<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCAT extends Model
{
    use HasFactory;

    protected $table = 'course_cats';

    protected $guarded = ['id'];
}
