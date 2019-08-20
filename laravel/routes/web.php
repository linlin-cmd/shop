<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//路由调用控制器和方法
// Route::get('/ha','HaController@index', function () {
//     // echo "123";
// });
//路由模拟表单
// Route::get('/ha',function () {
//     return '<form action="/haadd" method="post">'.csrf_field().'<input type="text" name="username"> <button>提交</button></form>';
// });
// //路由接收表单
// Route::post('/haadd',function () {
//     dd(request()->username);
// });
//多种路由
// Route::get('/ha',function () {
//     return '<form action="/haadd" method="post">'.csrf_field().'<input type="text" name="username"> <button>提交</button></form>';
// });
// Route::match(['get','post'], '/haadd', function () {
//  	dd(request()->username);
// });
//必选参数
// Route::get('ha/{id}', function ($id) {
//  return '我的猫呢' . $id;
// });
//命名路由
// Route::get('ha/index', function () {
//  // 通过路由名称生成 URL
//  return route('okk',['id'=>2]);
// })->name('okk');
//
// Route::get('ha/okk', function () {
//  // 通过路由名称生成 URL
//  return redirect()->route('okk');
// });
//主页面
// Route::view('/','welcome',['name' => '林林']);
//添加页面
Route::get('student/add','HaController@add')->middleware('checklogin');
//执行添加
Route::post('student/add_do','HaController@add_do',function(){

})->name('do');
//列表展示
Route::get('student/list','HaController@lists');
//删除
Route::get('student/delete/{id}','HaController@delete');
//邮箱
Route::get('mail/index','MailController@index');

//友情链接
Route::prefix('kao')->middleware('auth')->group(function () {
	//添加
 	Route::get('index','KaoController@index');
 	//执行添加
 	Route::post('add_do','KaoController@add_do',function(){

 	})->name('do');
 	//列表展示
 	Route::get('list','KaoController@kao_list');
 	//删除
 	Route::get('delete','KaoController@kao_del')->name('del');
 	//修改
 	Route::get('update/{id}','KaoController@update');
 	Route::post('update_do/{id}','KaoController@update_do');
 	//唯一性
 	Route::post('wei','KaoController@wei')->name('wei');
});






//后台路由分组
Route::prefix('goods')->middleware('checklogin')->group(function () {
  	//商品模块a

	Route::get('index','admin\GoodsController@index');
	//头部
	Route::get('head','admin\GoodsController@head')->name('head');
	//左边
	Route::get('left','admin\GoodsController@left')->name('left');
	//中间
	Route::get('main','admin\GoodsController@main')->name('main');
	//管理员管理
	Route::get('goods_user','admin\Goods_userController@index')->name('goods_user');
	//管理员添加
	Route::post('user_do','admin\Goods_userController@user_do',function(){

	})->name('user_do');


	//品牌管理
	Route::get('brand','admin\Goods_brandController@index')->name('goods_brand');
	//品牌添加
	Route::post('brand_do','admin\Goods_brandController@brand_do',function(){

	})->name('brand_do');
	//品牌展示
	Route::get('brand_list','admin\Goods_brandController@brand_list')->name('brand_list');
	//品牌删除
	Route::get('brand_delete/{id}','admin\Goods_brandController@brand_delete');
	//品牌修改
	Route::get('brand_update/{id}','admin\Goods_brandController@brand_update');
	Route::post('brand_update_do/{id}','admin\Goods_brandController@brand_update_do');


	//分类管理
	Route::get('cat','admin\Goods_catController@index')->name('goods_cat');
	//分类添加
	Route::post('cat_do','admin\Goods_catController@cat_do',function(){

	})->name('cat_do');
	//分类展示
	Route::get('cat_list','admin\Goods_catController@cat_list')->name('cat_list');


	//商品管理
	Route::get('goods','admin\Goods_goodsController@index')->name('goods');
	//商品添加
	Route::post('goods_do','admin\Goods_goodsController@goods_do',function(){

	})->name('goods_do');
	//商品展示
	Route::get('goods_list','admin\Goods_goodsController@goods_list')->name('goods_list');
	//商品修改
	Route::get('goods_update/{id}','admin\Goods_goodsController@goods_update');
	Route::post('goods_update_do/{id}','admin\Goods_goodsController@goods_update_do');
});

	//登录
	Route::get('goods/login','admin\LoginController@login')->name('login');
	Route::post('goods/login_do','admin\LoginController@login_do',function(){

	})->name('login_do');
	//退出
	Route::get('goods/tui','admin\LoginController@tui')->name('tui');



//登录注册
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




//前台路由分组	->middleware('checklogin')
Route::prefix('/')->group(function () {
	//首页
	Route::get('/','index\IndexController@index');
	//分类展示商品
	Route::get('prolist/{id}','index\IndexController@prolist');
	Route::get('prolist_do','index\IndexController@prolist_do');
	//商品详情
	Route::get('proinfo/{id}','index\IndexController@proinfo');
	//加入购物车
	Route::get('car/{id}','index\IndexController@car');
	//购物车展示
	Route::get('car_do','index\IndexController@car_do');
	Route::get('getmoney','index\IndexController@getmoney');
	//批量删除
	Route::get('car_del','index\IndexController@car_del');
	//收获地址
	Route::get('address','index\IndexController@address');
	//添加收获地址
	Route::post('region','index\IndexController@region');
	Route::post('address_do','index\IndexController@address_do');
	//结算
	Route::get('pay','index\IndexController@pay');
	Route::get('pay_do','index\IndexController@pay_do');
});
//前台登录
Route::get('login','index\LoginController@index');
Route::post('login_do','index\LoginController@login_do');
//注册
Route::get('reg','index\LoginController@reg');
Route::post('reg_do','index\LoginController@reg_do');
Route::post('email','index\LoginController@email');
