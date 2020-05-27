<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\This;

class Exam extends Model
{
    use  SoftDeletes;
    protected $fillable = ['class_id', 'student_type_id', 'exam_type', 'exam_name', 'exam_status'];


}
