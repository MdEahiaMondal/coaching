<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTypeDetail extends Model
{
    protected $fillable = [
        'student_register_id',
        'class_id',
        'student_type_id',
        'batch_id',
        'roll_no',
        'student_type_detail_status',
    ];
}
