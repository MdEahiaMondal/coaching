<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $fillable = [
        'academic_session',
        'student_id',
        'student_type_id',
        'class_id',
        'batch_id',
        'attendance',
        'created_by',
        'updated_by'
    ];
}
