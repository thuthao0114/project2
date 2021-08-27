<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id_student';
    protected $guarded = ['id_student'];
    public $timestamps = FALSE;

    public function grades(){
        return $this->belongsTo('App\Models\Grade','id_grade','id_grade');
    }
}
