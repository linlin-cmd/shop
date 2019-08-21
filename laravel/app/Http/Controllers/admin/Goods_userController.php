<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreGoods_userPost;
use DB;
use Validator;
class Goods_userController extends Controller
{
    public function index(){
        //列表展示
    	$data =DB::table('goods_user')->get();
    	return view('admin/goods_user/index',['data'=>$data]);
    }
    public function user_do(Request $request){
        $post =request()->except('_token');
        $validator = Validator::make($post, [
            'user_name'=>'required|unique:goods_user|max:30',
            'user_pwd'=>'required|numeric',
            ],[
             'user_name.required' => '用户名不能为空',
             'user_name.unique' => '用户名已存在',
             'user_name.max' => '用户名最大为30',
             'user_pwd.required' => '密码不能为空',
             'user_pwd.numeric' => '密码必须为数字',
            ]);
        if ($validator->fails()) {
                return json_encode(['ret'=>0,'msg'=>$validator->errors()]);die;
        }
    	$res =DB::table('goods_user')->insert($post);
    	if ($res) {
    		return json_encode(['ret'=>1,'msg'=>'添加成功']);
    	}
    }
}
