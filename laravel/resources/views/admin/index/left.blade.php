<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页左侧导航</title>
<link rel="stylesheet" type="text/css" href="/laravel/css/public.css" />
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
<script type="text/javascript" src="/laravel/js/public.js"></script>
<head></head>

<body id="bg">
	<!-- 左边节点 -->
	<div class="container">

		<div class="leftsidebar_box">
			<a href="" target="main"><div class="line">
					<img src="/laravel/img/coin01.png" />&nbsp;&nbsp;首页
				</div></a>
			<!-- <dl class="system_log">
			<dt><img class="icon1" src="/laravel/img/coin01.png" /><img class="icon2"src="/laravel/img/coin02.png" />
				首页<img class="icon3" src="/laravel/img/coin19.png" /><img class="icon4" src="/laravel/img/coin20.png" /></dt>
		</dl> -->
			<!-- 管理员模块 -->
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/laravel/img/coin03.png" /><img class="icon2"
						src="/laravel/img/coin04.png" /> 网站管理<img class="icon3"
						src="/laravel/img/coin19.png" /><img class="icon4"
						src="/laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks" href="{{route('goods_user')}}"
						target="main">管理员管理</a><img class="icon5" src="/laravel/img/coin21.png" />
				</dd>
			</dl>
			<!-- 商品品牌 -->
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/laravel/img/coin03.png" /><img class="icon2"
						src="/laravel/img/coin04.png" /> 品牌管理<img class="icon3"
						src="/laravel/img/coin19.png" /><img class="icon4"
						src="/laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks" href="{{route('goods_brand')}}"
						target="main">品牌添加</a><img class="icon5" src="/laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks" href="{{route('brand_list')}}"
						target="main">品牌展示</a><img class="icon5" src="/laravel/img/coin21.png" />
				</dd>
			</dl>
			<!-- 商品分类 -->
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/laravel/img/coin03.png" /><img class="icon2"
						src="/laravel/img/coin04.png" /> 分类管理<img class="icon3"
						src="/laravel/img/coin19.png" /><img class="icon4"
						src="/laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks" href="{{route('goods_cat')}}"
						target="main">分类添加</a><img class="icon5" src="/laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks" href="{{route('cat_list')}}"
						target="main">分类展示</a><img class="icon5" src="/laravel/img/coin21.png" />
				</dd>
			</dl>
			<!-- 商品 -->
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/laravel/img/coin03.png" /><img class="icon2"
						src="/laravel/img/coin04.png" /> 商品管理<img class="icon3"
						src="/laravel/img/coin19.png" /><img class="icon4"
						src="/laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks" href="{{route('goods')}}"
						target="main">商品添加</a><img class="icon5" src="/laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks" href="{{route('goods_list')}}"
						target="main">商品展示</a><img class="icon5" src="/laravel/img/coin21.png" />
				</dd>
			</dl>
			<!-- 系统模块 -->
			<dl class="system_log">
				<dt>
					<img class="icon1" src="/laravel/img/coinL1.png" /><img class="icon2"
						src="/laravel/img/coinL2.png" /> 系统管理<img class="icon3"
						src="/laravel/img/coin19.png" /><img class="icon4"
						src="/laravel/img/coin20.png" />
				</dt>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a href="../changepwd.html"
						target="main" class="cks">修改密码</a><img class="icon5"
						src="/laravel/img/coin21.png" />
				</dd>
				<dd>
					<img class="coin11" src="/laravel/img/coin111.png" /><img class="coin22"
						src="/laravel/img/coin222.png" /><a class="cks">退出</a><img
						class="icon5" src="/laravel/img/coin21.png" />
				</dd>
			</dl>

		</div>

	</div>
</body>
</html>
