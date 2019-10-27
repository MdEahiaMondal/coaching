<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
    protected $fillable = ['name', 'subTitle', 'address', 'copyRight', 'mobile', 'status', ];
}
