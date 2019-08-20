<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoginController extends Controller
{
    public function login(){
    	return view('admin/login/login');
    }
    public function login_do(){
    	$data =request()->except('_token');
        $res=DB::table('goods_user')->where('user_name','=',$data['user_name'])->first();
        // dd($res);
        if(!$res){
            return redirect('goods/login');
        }else{
            if($data['user_pwd']!=$res->user_pwd){
                return redirect('goods/login');
            }else{
                request()->session()->put('login',$res);
                return redirect('goods/index');
            }
        }
    	// dd($post);
    }
    public function tui(){
        request()->session()->pull('login');
        // $login =session('login');
        return redirect('goods/login');
    }
}
