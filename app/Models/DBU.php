<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DBU extends Model
{
    protected $table = "users";
    protected $guarded = [];
    protected $dates = ['updated_at'];
}