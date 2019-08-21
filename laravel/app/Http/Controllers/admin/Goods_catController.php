<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Goods_cat;
class Goods_catController extends Controller
{
    public function index(){
        //调用查询方法
    	$data =Goods_cat::getgoods_cat();
    	return view('admin/goods_cat/index',['data'=>$data]);
    }
    public function cat_do(){
        //接收数据
    	$post =request()->except('_token');
        //添加入库
    	$res =Goods_cat::create($post);
    	if ($res) {
    		return redirect('goods/cat_list');
    	}
    }
    public function cat_list(){
        //查询数据
    	$data =Goods_cat::getgoods_cat();
    	return view('admin/goods_cat/cat_list',['data'=>$data]);
    }
}
