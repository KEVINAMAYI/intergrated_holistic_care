<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkingStatus extends Model
{
    use HasFactory;

    protected $table = 'marking_statuses';

    protected $guarded = ['id'];

}
