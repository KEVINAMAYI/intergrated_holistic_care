<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class ClosedQuestion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    protected function options(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value),
        );
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
