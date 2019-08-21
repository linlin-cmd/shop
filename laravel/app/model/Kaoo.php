<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Kaoo extends Model
{
    protected $table = 'kao';
    protected $primaryKey = 'kao_id';
    public $timestamps = false;
    protected $fillable = ['kao_name','kao_url','is_logo','kao_img','kao_content','is_show'];
}
