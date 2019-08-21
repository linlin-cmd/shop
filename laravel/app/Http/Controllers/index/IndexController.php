<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Goods_goods;
use App\model\Goods_cat;
use App\model\Car;
use DB;
class IndexController extends Controller
{
	//前台展示
    public function index(){
    	//商品数量
    	$count =Goods_goods::count();
    	//商品是否后台推荐
    	$recommend =Goods_goods::where(['is_recommend'=>1])->get();
    	//一级商品
    	$one =Goods_cat::where(['parent_id'=>0])->get();
    	//获取8条后台推荐商品
    	$eight_recommend =Goods_goods::where(['is_recommend'=>1])->paginate(8);
    	//获取3条特价商品
    	$three_special =Goods_goods::where(['is_special'=>1])->paginate(3);
    	return view('index/index',compact('count','recommend','one','eight_recommend','three_special'));
    }
    //分类展示
    public function prolist($id){
    	//找一下一级分类下的子分类
    	$cat_id =Goods_cat::where(['cat_id'=>$id])->select(['cat_id'])->get()->toArray();
    	$parent_id=Goods_cat::where(['parent_id'=>$id])->select(['cat_id'])->get()->toArray();
    	//合并数组
    	$merge =array_merge($cat_id,$parent_id);
    	//数组取列
    	$column =array_column($merge,'cat_id');
    	//ajax搜索
    	$goods_name =request()->goods_name??"";
    	//拼接where
    	$where =[];
    	//判断是否有值
    	if ($goods_name) {
    		$where[] =['goods_name','like','%'.$goods_name.'%'];
    	}
    	//当前大类下的所有子类商品列表页
    	$one_goods =Goods_goods::where($where)->whereIn('cat_id',$column)->get();

	  	//判断是否是ajax请求
    	if (request()->ajax()) {
		    return $one_goods;
		}
		return view('index/prolist',compact('one_goods','goods_name'));
    }
    //全部商品
    public function prolist_do(){
    	$one_goods =Goods_goods::get();
    	return view('index/prolist_do',compact('one_goods'));
    }
    //商品详情
    public function proinfo($id){
    	//根据id查询商品表
    	$goods =Goods_goods::find($id);
    	
    	return view('index/proinfo',compact('goods'));
    }
    public function car($id){
    	//判断是否登录
    	if (session('index_login')=="") {
    		return redirect('login');
    	}
    	//加入购物车
    	//接收数量
    	$number =request()->number??"";
    	//取出用户id
    	$user_id =session('index_login')->web_id;
    	//通过商品id获取商品
    	$goods =Goods_goods::select('goods_id','goods_name','goods_price','goods_img')				  ->find($id)->toArray();
    	//拼接数据
    	$arr =[
    		'user_id'=>$user_id,
    		'goods_number'=>$number
    	];
    	//合并数据
    	$car =array_merge($arr,$goods);
    	//拼接where
    	$where =[
    		'user_id'=>$user_id,
    		'goods_id'=>$id
    	];
    	//查看购物车是否有这个商品
    	$count =Car::where($where)->count();
    	if ($count) {
    		//查看当前购物车商品数量
    		$goods_number =Car::select('goods_number')->where($where)->get()->toArray();
    		//数组取列
    		$goods_number =array_column($goods_number,'goods_number');
    		//用implode转换为字符串
    		$goods_number =implode('',$goods_number);
    		$goods_number+=$number;
    		$goods_car =Car::where($where)->update(['goods_number'=>$goods_number]);
    		if ($goods_car) {
	    		return ['ret'=>1,'msg'=>'加入购物车成功'];
	    	}
    	}else{
    		//加入购物车
	    	$goods_car =Car::create($car);
	    	//判断
	    	if ($goods_car) {
	    		return ['ret'=>1,'msg'=>'加入购物车成功'];
	    	}
    	}
    }
    //购物车
    public function car_do(){
    	//判断是否登录
    	if (session('index_login')=="") {
    		return redirect('login');
    	}
    	$count =Car::get()->count();
    	$data =Car::get();
    	return view('index/car',compact('count','data'));
    }
    //商品价钱
    public function getmoney(){
    	//用户id
    	$user_id =session('index_login')->web_id;
    	//商品id
    	$goods_id =request()->goods_id;
    	//判断商品id不存在
    	if (!$goods_id) {
            return number_format(0,'2','.','');
        }
    	//分割数组
    	$goods_id =implode(',',$goods_id);
    	//定义为0
    	$total =0;
    	$total =DB::select("select sum(goods_price * goods_number) as total from car where user_id=$user_id and goods_id in ($goods_id)");
    	//转为json格式
    	$total =json_decode(json_encode($total),true);
    	return number_format($total[0]['total'],'2','.','');
    }
    public function car_del(){
    	//接收id
    	$goods_id =request()->goods_id;
    	// 判断是否有id
    	if (!$goods_id) {
    		return;
    	}
    	$goods_id =implode(',',$goods_id);
    	//拼接条件
    	$where =[
    		'user_id'=>session('index_login')->web_id
    	];
    	$car =Car::where($where)->whereIn('goods_id',$goods_id)->delete();
    	if ($car) {
    		return ['ret'=>1,'msg'=>'删除成功'];
    	}
    }
    //收获地址
    public function address(){
    	$add =DB::table('region')->where('parent_id','0')->get();
    	return view('index/address',compact('add'));
    }
    //执行添加收货信息
    public function region(){
    	//获取数据
    	$post =request()->except('_token');
    	$res =DB::table('address')->insert($post);
        if ($res) {
            return redirect('pay');
        }
    }
    //四级联动
    public function address_do(){
    	$region_id =request()->region_id;
        $regions =DB::table('region')->where('parent_id',$region_id)->get();
        return $regions;
    }
    public function pay_do(){
        $index_login =session('index_login');
        if ($index_login) {
            return ['ret'=>1,'msg'=>'已登录'];
        }else{
            return ['ret'=>1,'msg'=>'未登录'];
        }
    }
    //结算
    public function pay(){
    	//查询是否有收获地址
    	$region =DB::table('address')->count();
    	if (!$region) {
    		return redirect('address');
    	}
        //获取id
        $ids =request()->ids;
        $ids =explode(',',$ids);
        $pay =Car::whereIn('goods_id',$ids)->get();
        //查询收获地址
    	return view('index/pay',compact('pay'));
    }
}
