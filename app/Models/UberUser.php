<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UberUser extends Model
{
    protected $fillable =[
        'username',
        'email',
        'mobile',
    ];
   
}
