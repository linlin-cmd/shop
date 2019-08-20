<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 's_id';
    public $timestamps = false;
    protected $fillable = ['name','age','sex'];
    // public function getstudent(){
    // 	self::get();
    // }
}
