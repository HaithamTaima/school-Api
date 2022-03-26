<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $fillable = ['name','number','department_id'];


     public function department()
     {
         return $this->belongsTo(Department::class,'department_id');
     }
}
