<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>三级分销</title>
    <link rel="shortcut icon" href="/laravel/index/images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/laravel/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/laravel/index/css/style.css" rel="stylesheet">
    <link href="/laravel/index/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond./laravel/index/js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/laravel/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$count}}</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/laravel/index/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     <div class="dingdanlist">
  
      <table>
          <tr>
            <td width="100%" colspan="4">
              <a href="javascript:;"><input type="checkbox" name="check" class="int" /> 全选</a>
            </td>
         </tr>
  @foreach ($data as $v)
       <tr>
        <td width="4%">
            <input type="checkbox" name="checkd" class="val" value="{{$v->goods_id}}" />
        </td>
        <td class="dingimg" width="15%">
            <img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
           <h3>{{$v->goods_name}}</h3>
           <time>下单时间：2015-08-11  13:51</time>
        </td>
        <td align="right">
            <input type="text" class="spinnerExample" value="{{$v->goods_number}}"  />
        </td>
       </tr>
       <tr>
          <th colspan="4"><strong class="orange">¥{{$v->goods_price}}</strong></th>
       </tr>
  @endforeach
       <tr>
        <td width="100%" colspan="4">
          <a href="javascript:;"><button class="del">删除</button></a></td>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥<span  id="price">0.00</span></strong></td>
       <td width="40%"><a href="javascript:void(0)" onclick="jiesuan()" class="jiesuan">去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/laravel/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/laravel/index/js/bootstrap.min.js"></script>
    <script src="/laravel/index/js/style.js"></script>
    <!--jq加减-->
    <script src="/laravel/index/js/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>
<script type="text/javascript">
  //全选
  $('.int').on('click',function(){
      $('[name="checkd"]').prop('checked',$(this).prop('checked'));
      getmoney();
  })
  //单点
  $('.val').on('click',function(){
      getmoney();
  })
  //封装方法
  function getmoney(){
      var array =new Array();
      var obj =$('[name="checkd"]:checked');
      $.each(obj,function(i,v){
          var goods_id =$(this).val();
          array.push(goods_id);
      })
      $.ajax({
        url:"{{url('getmoney')}}",
        data:{goods_id:array},
        dataType:"json",
        success:function(res){
            $('#price').text(res);
        }
      })
  }
  //批量删除
  $('.del').on('click',function(){
        //定义一个空数组
        var array =new Array();
        //接收选中的值
        var obj =$('[name="checkd"]:checked');
        $.each(obj,function(i,v){
            var goods_id =$(this).val();
            array.push(goods_id);
        })
        //判断没有的时候
        if (!array.length) {
            alert('请选择需要删除的商品');return;
        };
        $.ajax({
            url:"{{url('car_del')}}",
            dataType:"json",
            data:{goods_id:array},
            success:function(res){
                if (res.ret=="1") {
                  alert(res.msg);
                  window.location.reload();
                };
            }
        })
    })
  //确认结算
  function jiesuan(){
    //定义一个空数组
      var array =new Array();
      //接收选中的值
      var obj =$('[name="checkd"]:checked');
      $.each(obj,function(i,v){
          var goods_id =$(this).val();
          array.push(goods_id);
      })
      if (!array.length) {
          alert('请选择商品');return;
      };
      //发送ajax
      $.ajax({
        url:"{{url('pay_do')}}",
        data:{goods_id:array},
        dataType:"json",
        success:function(res){
          if (res.ret==1) {
            location.href="{{url('pay')}}"+"?ids="+array;
          };
        }
      })
  }
</script>