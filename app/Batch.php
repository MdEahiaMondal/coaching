<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['class_id', 'student_type_id', 'name', 'status' ,'student_capacity'];
}
