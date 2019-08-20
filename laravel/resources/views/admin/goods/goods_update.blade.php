<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题添加-有点</title>
<link rel="stylesheet" type="text/css" href="/laravel/css/css.css" />
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;商品添加
			</div>
		</div>
	<form action="{{url('goods/goods_update_do/'.$upd->goods_id)}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>商品添加</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						商品名称：<input type="text" class="input3" name="goods_name" value="{{$upd->goods_name}}" />
					</div>
					<div class="bbD">
						商品货号：<input type="text" class="input3" name="goods_sn" value="{{$upd->goods_sn}}" />
					</div>
					<div class="bbD">
						商品分类：
						<select class="input3" name="cat_id">
							<option>请选择分类</option>
							@foreach($cat as $v)
								<option value="{{$v->cat_id}}" @if($upd->cat_id==$v->cat_id) selected  @endif>
									{{$v->cat_name}}
								</option>
							@endforeach
						</select>
					</div>
					<div class="bbD">
						商品品牌：
						<select class="input3" name="brand_id">
							<option>请选择分类</option>
							@foreach($brand as $v)
								<option value="{{$v->brand_id}}" @if($upd->brand_id==$v->brand_id) selected  @endif>
									{{$v->brand_name}}
								</option>
							@endforeach
						</select>
					</div>
					<div class="bbD">
						商品图片：<input type="file" name="goods_img"/>
						<input type="hidden" name="oidimg" value="{{$upd->goods_img}}" />
					</div>
					<div class="bbD">
						商品价钱：<input type="text" class="input3" name="goods_price" value="{{$upd->goods_price}}" />
					</div>
					<div class="bbD">
						商品库存：<input type="text" class="input3" name="goods_number" value="{{$upd->goods_number}}" />
					</div>
					<div>
						商品推荐：<input type="checkbox"  name="is_recommend" value="1" @if($upd->is_recommend=="1") checked="checked" @endif />推荐
						<input type="checkbox"  name="is_boutique" value="1" 
						@if($upd->is_boutique=="1") checked="checked" @endif />精品
						<input type="checkbox"  name="is_special" value="1"  
						@if($upd->is_special=="1") checked="checked" @endif />特价
					</div>
					<div class="bbD">
						是否显示：
						<label>
							<input type="radio" name="is_show" value="1" @if($upd->is_show=="1") checked="checked" @endif  />&nbsp;是
						</label>
						<label>
							<input type="radio" name="is_show" value="0" @if($upd->is_show=="0") checked="checked" @endif />&nbsp;否
						</label>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
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