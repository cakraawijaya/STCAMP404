<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DBS extends Model
{
    protected $table = "siswa";
    protected $guarded = [];
    protected $dates = ['updated_at'];

    public function reset(){
        DB::statement('SET  @num := 0;');
        DB::statement('UPDATE siswa SET id = @num := (@num+1);');
        DB::statement('ALTER TABLE siswa AUTO_INCREMENT =1;');
    }
}