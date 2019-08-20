<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class Goods_brandController extends Controller
{
    public function index(){
    	return view('admin/goods_brand/index');
    }
    public function brand_do(request $request){
    	$post =request()->except('_token');
    	// dd($request->hasFile('brand_img'));
    	//文件上传
    	if ($request->hasFile('brand_img')) {
    		$post['brand_img'] =upload('brand_img');
    	}
    	$res =DB::table('goods_brand')->insert($post);
    	if ($res) {
    		return redirect('goods/brand_list');
    	}
    }
    public function brand_list(){
    	//分页
    	$page =config('app.pagesize');
    	//搜索
    	$query =request()->post();
    	$name =$query['brand_name']??"";
    	$where =[];
    	//判断拼接搜索条件
    	if ($name) {
    		$where[] =['brand_name','like',$name.'%'];
    	}
    	$data =DB::table('goods_brand')->where($where)->paginate($page);
    	return view('admin/goods_brand/brand_list',compact('data','name'));
    }
    //删除
    public function brand_delete($id){
        $del =DB::table('goods_brand')->where(['brand_id'=>$id])->delete();
        if ($del) {
            return redirect('goods/brand_list');
        }
    }
    //修改展示
    public function brand_update($id){
        $data =DB::table('goods_brand')->where(['brand_id'=>$id])->get();
        // dd($data);
        return view('admin/goods_brand/brand_update',['data'=>$data]);
    }
    //修改执行
    public function brand_update_do($id){
        $post =request()->except('_token');
        if (request()->hasFile('brand_img')) {
            $post['brand_img'] =upload('brand_img');
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
        $upd =DB::table('goods_brand')->where(['brand_id'=>$id])->update($post);
        // dd($upd);
        return redirect('goods/brand_list');
    }
}
