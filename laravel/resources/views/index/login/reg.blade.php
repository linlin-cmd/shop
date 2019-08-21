@extends('layouts.shop')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/laravel/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('reg_do')}}" method="post" class="reg-login">
      @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList">
          <input type="text" placeholder="输入手机号码或者邮箱号" name="web_name"/>
       </div>
       <div class="lrList2">
          <input type="text" placeholder="输入短信验证码" name="code"/> 
          <button class="but">获取验证码</button>
          <!-- <input type="button" class="bto" value="获取验证码"> -->
       </div>
       <div class="lrList">
          <input type="text" placeholder="设置新密码（6-18位数字或字母）" name="web_pwd" />
          <!-- @php echo $errors->first('web_pwd') @endphp -->
       </div>
       <div class="lrList">
          <input type="text" placeholder="再次输入密码" name="web_pwd_confirmation" />
          <!-- @php echo $errors->first('web_pwd_confirmation') @endphp -->
       </div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
  <script src="/laravel/jq.js"></script>
 <script type="text/javascript">
    $('.but').on('click',function(){
      event.preventDefault();
      var web_name =$("[name='web_name']").val();
      $.ajax({
        url:"{{url('email')}}",
        type:"post",
        dataType:'json',
        data:{web_name:web_name},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            if (res.ret==1) {
              alert(res.msg);
            };
        }
      })
    })
 </script>
@include('public.index.floor')
 @endsection
