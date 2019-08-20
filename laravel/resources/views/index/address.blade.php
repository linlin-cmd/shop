<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/laravel/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('region')}}" method="post" class="reg-login">
        @csrf
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="收货人" name="consignee" /></div>
       <div class="lrList"><input type="text" placeholder="详细地址" name="address" /></div>
        <div class="lrList">
          <select name="country">
            <option value="0">请选择...</option>
            @foreach ($add as $v)
              <option value="{{$v->region_id}}">{{$v->region_name}}</option>
            @endforeach
          </select>
            <select name="province" style="display:none;">
              <option value="0">请选择...</option>
            </select>
            <select name="city" style="display:none;">
              <option value="0">请选择...</option>
            </select>
            <select name="district" style="display:none;">
              <option value="0">请选择...</option>
            </select>
         </div>
       <div class="lrList"><input type="text" placeholder="手机" name="tel" /></div>
       <div class="lrList2"><input type="text" placeholder="设为默认地址" name="status" /> <button>设为默认</button></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <a href="javascript:void(0)" onclick="add_address()">保存</a>
      </div>
     </form><!--reg-login/-->
     <script src="/laravel/index/js/jquery.min.js"></script>
     <script type="text/javascript">
        function add_address(){
          $('.reg-login').submit();
        }
        //四级联动
        $('.lrList select').on('change',function(){
          //获取id
            var region_id =$(this).val();
            var str ='<option value="0">请选择...</option>';
            var obj =$(this);
            $.ajax({
              url:"{{url('address_do')}}",
              type:"post",
              dataType:"json",
              data:{region_id:region_id},
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              success:function(res){
                  $.each(res,function(i,v){
                    str +="<option value="+v.region_id+">"+v.region_name+"</option>";
                  })
                  //重新找到它下个赋值
                  obj.next().html(str).show();
              }
            })
        })
     </script>
 @include('public.index.floor')