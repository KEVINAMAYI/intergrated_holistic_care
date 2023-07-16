<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public  function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }


    public function lectures(){
        return $this->hasMany(Lecture::class);
    }

    public function closedEndedQuestions(){
        return $this->hasMany(ClosedQuestion::class);
    }

    public function openEndedQuestions(){
        return $this->hasMany(OpenQuestion::class);
    }
}
