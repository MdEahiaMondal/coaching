<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentType extends Model
{
    use SoftDeletes;
   protected $fillable = ['class_name_id', 'student_type', 'status'];
}
