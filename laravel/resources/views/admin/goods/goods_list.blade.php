<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题管理-有点</title>
<link rel="stylesheet" type="text/css" href="/laravel/css/css.css" />
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/laravel/js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<div class="conform">
					<form>
						<div class="cfD">
							<input class="addUser" type="text" placeholder="商品" />
							<button class="button">搜索</button>
							<a class="addA addA1" href="{{route('goods')}}">添加商品+</a>
						</div>
					</form>
				</div>
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="200px" class="tdColor">商品名称</td>
							<td width="125px" class="tdColor">商品编号</td>
							<td width="155px" class="tdColor">商品分类</td>
							<td width="175px" class="tdColor">商品品牌</td>
							<td width="190px" class="tdColor">商品图片</td>
							<td width="130px" class="tdColor">商品价钱</td>
							<td width="200px" class="tdColor">商品库存</td>
							<td width="140px" class="tdColor">是否上架</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
			@foreach($data as $v)
						<tr>
							<td>{{$v->goods_id}}</td>
							<td>{{$v->goods_name}}</td>
							<td>{{$v->goods_sn}}</td>
							<td>{{$v->cat_name}}</td>
							<td>{{$v->brand_name}}</td>
							<td><img width="30" heigth="30" src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" alt="" /></td>
							<td>{{$v->goods_price}}</td>
							<td>{{$v->goods_number}}</td>
							<td>
								@if($v->is_show=="1")
								是
								@else否
								@endif
							</td>
							<td>
							<a href="{{url('goods/goods_update/'.$v->goods_id)}}">
								<img class="operation" src="/laravel/img/update.png">
							</a> 
							<a href="">
								<img class="operation delban" src="/laravel/img/delete.png">
							</a>
							</td>
						</tr>
			@endforeach
					</table>
					<div class="paging">此处是分页</div>
				</div>
				<!-- topic 表格 显示 end-->
			</div>
			<!-- topic页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="/laravel/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>