<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cookie;
use App\model\Student;
class HaController extends Controller
{
    public function index(){
    	return "我的猫呢";
    }
    public function add(){
        //存session
        $login =['id'=>1,'name'=>"林林"];
        session(['login' => $login]);
        //取session
        $user =session('login');
        //添加session入库
        request()->session()->save();
        //清除session
        // session(['user'=>'null']);
        // $user =session('user');
        // dd($user);


        //存cookie
        // Cookie::queue('uu','kk',24*60);
    	return view('add');
    }
    public function add_do(){
    	$post =request()->except('_token');
    	$res =Student::create($post);
    	if ($res) {
    		return redirect('student/list');
    	}
    }
    public function lists(){
        
        $user =request()->cookie('lin');
        // dd($user);
    	$data =DB::table('student')->get();
    	return view('lists',['data'=>$data]);
    }
    public function delete($id){
        $del =Student::destroy($id);
        if ($del) {
            return redirect('student/list');
        }
    }
    public function update($id){
        $upd =Student::find($id);
        // dd($upd);
        return view('update',['upd'=>$upd]);
    }
    public function update_do($id){
        $post =request()->except('_token');
        $res =Student::where(['s_id'=>$id])->update($post);
        return redirect('student/list');
    }
}
