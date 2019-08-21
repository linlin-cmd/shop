<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="/laravel/css/css.css" />
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">商品管理</a>&nbsp;-</span>&nbsp;品牌管理
			</div>
		</div>
	<form action="{{url('goods/brand_update_do/'.$data[0]->brand_id)}}" method="post"  enctype="multipart/form-data">
		@csrf
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>上传广告</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						品牌名称：<input type="text" class="input1" name="brand_name" value="{{$data[0]->brand_name}}" />
					</div>
					<div class="bbD">
						品牌地址：<input type="text" class="input1" name="brand_url"  value="{{$data[0]->brand_url}}"/>
					</div>
					<div class="bbD">
						上传图片：
						<div class="bbDd">
							<div class="bbDImg">
								<img with="160" height="180" src="{{env('UPLOAD_URL')}}{{$data[0]->brand_img}}">
							</div>
							<input type="hidden" name="oidimg" value="{{$data[0]->brand_img}}" />
							<input type="file" class="file" name="brand_img" />
							
							 <a class="bbDDel" href="#">删除</a>
						</div>
					</div>
					<div class="bbD">
						是否显示：
							<label>
								<input type="radio" name="is_show" value="1" @if($data[0]->is_show=="1") checked="checked" @endif />是
							</label> 
							<label>
								<input type="radio" name="is_show" value="0" @if($data[0]->is_show=="0") checked="checked" @endif />否
							</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						排序：<input class="input2" type="text" name="pai" value="{{$data[0]->pai}}" />
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">修改</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>
	</form>
			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>