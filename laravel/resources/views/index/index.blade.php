@extends('layouts.shop')
@section('content')
     <div class="head-top">
      <img src="/laravel/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/laravel/index/images/touxiang.jpg" /></a></dt>
       <dd>
       @if(session('index_login')=="")
          <h1 class="username">未登录</h1>
       @else
          <h1 class="username">{{session('index_login')->web_name}}</h1>
       @endif
        <ul>
         <li><a href="prolist.html"><strong>{{$count}}</strong><p>全部商品</p></a></li>
         <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
        @if(session('index_login')=="")
          <li><a href="{{url('login')}}">登录</a></li>
          <li><a href="{{url('reg')}}" class="rlbg">注册</a></li>
        @endif
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
     <!-- 是否推荐 -->
        @foreach($recommend as $v)
          <a href="{{url('proinfo/'.$v->goods_id)}}">
            <img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" />
          </a>
        @endforeach
     </div><!--sliderA/-->
     <ul class="pronav">
        <!-- 一级分类 -->
          @foreach($one as $v)
          <li><a href="{{url('prolist/'.$v->cat_id)}}">{{$v->cat_name}}</a></li>
          @endforeach
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
     <!-- 获取8条后台推荐商品 -->
      @foreach($eight_recommend as $v)
      <div class="index-pro1-list">
       <dl>
        <dt>
            <a href="{{url('proinfo/'.$v->goods_id)}}"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" /></a>
        </dt>
        <dd class="ip-text"><a href="proinfo.html">{{$v->goods_name}}</a>
          <span>已售：488</span>
        </dd>
        <dd class="ip-price"><strong>¥{{$v->goods_price}}</strong> 
            <span>¥{{$v->goods_price+500}}</span>
        </dd>
       </dl>
      </div>
      @endforeach

      <div class="clearfix"></div>
     </div><!--index-pro1/-->
     <div class="prolist">
      <!-- 获取3条特价商品 -->
        @foreach($three_special as $v)
        <dl>
         <dt><a href="proinfo.html">
                  <img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="100" height="100" />
             </a>
         </dt>
         <dd>
          <h3><a href="proinfo.html">{{$v->goods_name}}</a></h3>
          <div class="prolist-price">
              <strong>¥{{$v->goods_price}}</strong> 
              <span>¥{{$v->goods_price+500}}</span>
          </div>
          <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
         </dd>
         <div class="clearfix"></div>
        </dl>
        @endforeach
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="/laravel/index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
     
@include('public.index.floor')
   @endsection