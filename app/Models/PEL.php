<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PEL extends Model
{
    protected $table = "pelatihan";
    protected $guarded = [];
    protected $dates = ['updated_at'];
}