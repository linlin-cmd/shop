@extends('layouts.shop')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
      <!-- 当前大类下的搜索功能 -->
         <form class="prosearch">
            <input type="text" name="goods_name" value="{{$goods_name}}"/>
         </form>
      </div>
     </header>
     <ul class="pro-select">
        <li><a href="javascript:void(0);">推荐</a></li>
        <li><a href="javascript:void(0);">精品</a></li>
        <li><a href="javascript:void(0);">特价</a></li>
     </ul><!--pro-select/-->
     <!-- 搜索 -->
<div class="list">
     @foreach ($one_goods as $v)
     <div class="prolist">
        <dl>
         <dt>
          <a href="{{url('proinfo/'.$v->goods_id)}}">
              <img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="100" height="100" />
          </a>
         </dt>
         <dd>
            <h3><a href="{{url('proinfo/'.$v->goods_id)}}">{{$v->goods_name}}</a></h3>
            <div class="prolist-price">
              <strong>¥{{$v->goods_price}}</strong> 
              <span>¥{{$v->goods_price+500}}</span>
            </div>
            <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
         </dd>
         <div class="clearfix"></div>
        </dl>
     </div><!--prolist/-->
     @endforeach
</div>
     <script src="/laravel/jq.js"></script>
      <script type="text/javascript">
        // <!-- ajax搜索 -->
          $('.prosearch input').on('blur',function(){
            var goods_name =$(this).val();
            var url ="{{env('UPLOAD_URL')}}";
              $.ajax({
                url:'',
                data:{goods_name:goods_name},
                dataType:'json',
                success:function(res){
                    $('.list').empty();
                    $.each(res,function(i,v){
                        var tr=$("<div class='prolist'><dl></dl></div>");
                        tr.append('<dt><a href="proinfo.html"><img src='+url+v.goods_img+' width="100" height="100" /></a></dt><dd><h3><a href="proinfo.html">'+v.goods_name+'</a></h3><div class="prolist-price"><strong>¥'+v.goods_price+'</strong><span>¥'+(v.goods_price+500)+'</span></div><div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div></dd><div class="clearfix"></div>');
                        $('.list').append(tr);
                    })
                }
              })
          })
        // 新品销量特价
        $('.pro-select li').on('click',function(){
          $(this).addClass('pro-selCur').siblings().removeClass('pro-selCur');
          
        })
      </script>
@include('public.index.floor')
   @endsection