<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';
    protected $primaryKey = 'id_grade';
    protected $guarded = ['id_grade'];
    public $timestamps = FALSE;

    public function courses(){
        return $this->belongsTo('App\Models\Course','id_course','id_course');
    }
}
