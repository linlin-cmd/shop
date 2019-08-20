<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGoods_userPost;
use App\model\Kaoo;
class KaoController extends Controller
{
    public function index(){
    	return view('index');
    }
    public function add_do(StoreGoods_userPost $request){
    	$post =request()->except('_token');
    	if (request()->hasFile('kao_img')) {
		 	$post['kao_img'] =upload('kao_img');
		}
		$res =Kaoo::create($post);
		if ($res) {
			return redirect('kao/list');
		}
    }
    public function kao_list(){
    	$pagesize =config('app.pagesize');
    	//搜索
    	$query =request()->post();
    	//接收值
    	$name =$query['kao_name']??"";
    	//定义数组
    	$where =[];
    	//判断是否存在
    	if ($name) {
    		$where[] =['kao_name','like','%'.$name.'%'];
    	}
    	$data =Kaoo::where($where)->paginate($pagesize);
    	return view('kao_list',compact('data','name'));
    }
    public function kao_del(){
    	$kao_id =request()->id;
    	$del =Kaoo::destroy($kao_id);
    	if ($del) {
    		return ['ret'=>1,'msg'=>'删除成功'];
    	}
    }
    public function update($id){
    	$data =Kaoo::find($id);
    	return view('update',['data'=>$data]);
    }
    public function update_do( StoreGoods_userPost $id){
    	$post =request()->except('_token');
    	if (request()->hasFile('kao_img')) {
		 	if ($post['oidimg']) {
		 		$post['kao_img'] =upload('kao_img');
		 		$filename =storage_path('app/public').'/'.$post['oidimg'];
	            //判断是否存在
	            if (file_exists($filename)) {
	                unlink($filename);
	            }
		 	}else{
		 		$post['kao_img'] =upload('kao_img');
		 	}
		 	
		}
		unset($post['oidimg']);
		$res =Kaoo::where(['kao_id'=>$id])->update($post);
		return redirect('kao/list');
    }
    public function wei(){
    	$kao_name =request()->kao_name;
        //id
        $kao_id =request()->kao_id??"";
        if ($kao_name) {
            $where[] =['kao_name','=',$kao_name];
        }
        if ($kao_id) {
            $where[] =['kao_id','!=',$kao_id];
        }
    	// echo $kao_name;die;
    	$res =Kaoo::where($where)->count();
    	if ($res) {
    		return ['ret'=>1,'msg'=>'用户名已存在'];
    	}
    }
}
