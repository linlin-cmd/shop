<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'car_id';
    public $timestamps = false;
    protected $fillable = ['user_id','goods_id','goods_name','goods_price','goods_number','goods_img'];
    //未完
    public static function getmoneys($user_id,$goods_id){
    	$sql ="select sum(goods_price * goods_number) as total from car where user_id=$user_id and goods_id in ($goods_id)";
    }
}
