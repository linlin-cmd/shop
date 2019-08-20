<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Goods_cat extends Model
{
    protected $table = 'goods_cat';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;
    protected $fillable = ['cat_name','parent_id','sort_order'];
    //查询
    public static function getgoods_cat(){
    	$data =self::get();
    	return createcat($data);
    }

    
}
