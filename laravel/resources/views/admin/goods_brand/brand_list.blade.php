<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="/laravel/css/css.css" />
<!-- 分页样式 -->
<link rel="stylesheet" href="/bootstrap.min.css">
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/laravel/js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">商品管理</a>&nbsp;-</span>&nbsp;品牌管理
			</div>
		</div>

		
		<div class="page">
			<!-- banner页面样式 -->
			<div class="banner">
				<div class="add">
					<a class="addA" href="banneradd.html">上传广告&nbsp;&nbsp;+</a>
				</div>
				<!-- 搜索 -->
				<form>
					<input type="text" name="brand_name" value="{{$name}}"  />
					<input type="submit" value="搜索" />
				</form>
				<!-- banner 表格 显示 -->
				<div class="banShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="315px" class="tdColor">图片</td>
							<td width="308px" class="tdColor">名称</td>
							<td width="450px" class="tdColor">链接</td>
							<td width="215px" class="tdColor">是否显示</td>
							<td width="180px" class="tdColor">排序</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
				@foreach($data as $v)
						<tr>
							<td>{{$v->brand_id}}</td>
							<td><div class="bsImg">
									<img src="{{env('UPLOAD_URL')}}{{$v->brand_img}}">
								</div></td>
							<td>{{$v->brand_name}}</td>
							<td>
								<a class="bsA" href="#">{{$v->brand_url}}</a>
							</td>
							<td>
								@if($v->is_show=="1")
								是
								@else
								否
								@endif
							</td>
							<td>{{$v->pai}}</td>
							<td>
								<a href="{{url('goods/brand_update/'.$v->brand_id)}}">
									<img class="operation" src="/laravel/img/update.png">
								</a>
								<a href="{{url('goods/brand_delete/'.$v->brand_id)}}">
									<img class="operation delban" src="/laravel/img/delete.png">
								</a>
							</td>
						</tr>
				@endforeach
					</table>
					<div class="paging">{{ $data->appends(['brand_name' => $name])->links() }}</div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<!-- <div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="/laravel/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes" onclick="del()">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div> -->
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

function del(){
    var input=document.getElementsByName("check[]");
    for(var i=input.length-1; i>=0;i--){
       if(input[i].checked==true){
           //获取td节点
           var td=input[i].parentNode;
          //获取tr节点
          var tr=td.parentNode;
          //获取table
          var table=tr.parentNode;
          //移除子节点
          table.removeChild(tr);
        }
    }     
}
</script>
</html>