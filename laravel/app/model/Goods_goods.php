<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Goods_goods extends Model
{
    protected $table = 'goods';//表名
    protected $primaryKey = 'goods_id';//id
    public $timestamps = false;//禁止时间
    protected $fillable = ['goods_name','goods_sn','cat_id','brand_id','goods_img','goods_price','goods_number','is_show','is_recommend','is_boutique','is_special'];//数据库字段
    //查询
    public static function getgoods(){
    	return self::join('goods_cat','goods.cat_id','=','goods_cat.cat_id')
    				->join('goods_brand','goods.brand_id','=','goods_brand.brand_id')
    				->get();
    }
}
