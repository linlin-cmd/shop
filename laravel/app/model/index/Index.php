<?php

namespace App\model\index;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
   	protected $table = 'web';//表名
    protected $primaryKey = 'web_id';//id
    public $timestamps = false;//禁止时间
    protected $fillable = ['web_name','web_pwd','status'];//数据库字段
}
