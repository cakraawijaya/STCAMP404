<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBRS extends Model
{
    protected $table = "password_resets";
    protected $guarded = [];
    protected $dates = ['updated_at'];
}