<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Goods_goods;
use App\model\Goods_cat;
use App\model\Goods_brand;
use \DB;
class Goods_goodsController extends Controller
{
    public function index(){
    	//查询分类表
    	$cat =Goods_cat::getGoods_cat();
    	//查询品牌表
    	$brand =DB::table('goods_brand')->get();
    	//通过函数compact传到index页面
    	return view('admin/goods/index',compact('cat','brand'));
    }
    public function goods_do(){
    	//接收数据
    	$post =request()->except('_token');
    	//拼接商品编号
    	$post['goods_sn'] =time().rand(100,999);
        // dd($post);
    	//文件上传
    	if (request()->hasFile('goods_img')) {
    		$post['goods_img']=upload('goods_img');
    	}
    	//添加执行
    	$res =Goods_goods::create($post);
    	//跳转
    	if ($res) {
    		return redirect('goods/goods_list');
    	}
    }
    public function goods_list(){
        $data =Goods_goods::getgoods();
    	return view('admin/goods/goods_list',['data'=>$data]);
    }
    public function goods_update($id){
        //查询分类表
        $cat =Goods_cat::getGoods_cat();
        //查询品牌表
        $brand =DB::table('goods_brand')->get();
        //查询修改当前条数
        $upd =Goods_goods::find($id);
        return view('admin/goods/goods_update',compact('upd','cat','brand'));
    }
    public function goods_update_do($id){
        $post =request()->except('_token');
        if (request()->hasFile('goods_img')) {
            $post['goods_img'] =upload('goods_img');
            //查找之前图片
            $filename =storage_path('app/public').'/'.$post['oidimg'];
            //判断是否存在
            if (file_exists($filename)) {
                unlink($filename);
            }
        }
        unset($post['oidimg']);
        // dd($post);
        //修改
        $upd =Goods_goods::where(['goods_id'=>$id])->update($post);
        // dd($upd);
        return redirect('goods/goods_list');
    }
}
