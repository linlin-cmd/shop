<link rel="stylesheet" href="/bootstrap.min.css">
<form action="">
	<input type="text" name="kao_name" value="{{$name}}">
	<input type="submit" value="搜索">
</form>
<table border="1">
	<tr>
		<td>编号</td>
		<td>网站名称</td>
		<td>图片</td>
		<td>链接类型</td>
		<td>状态</td>
		<td>操作</td>
	</tr>
@foreach($data as $v)
	<tr>
		<td>{{$v->kao_id}}</td>
		<td>{{$v->kao_name}}</td>
		<td>
			<img width="30" height="30" src="{{env('UPLOAD_URL')}}{{$v->kao_img}}" alt="">
		</td>
		<td>
			@if($v->is_logo=="1")
			LOGO链接
			@else
			文字链接
			@endif
		</td>
		<td>
			@if($v->is_show=="1")
			显示
			@else
			不显示
			@endif
		</td>
		<td>
			<a href="{{url('kao/update/'.$v->kao_id)}}">编辑</a>
			<a href="javascript:void(0)" class="del" kao_id="{{$v->kao_id}}">删除</a>
		</td>
	</tr>
@endforeach
	<div>{{ $data->appends(['kao_name' =>$name])->links() }}</div>
</table>
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
<script type="text/javascript">
	$('.del').on('click',function(){
		var kao_id =$(this).attr('kao_id');
		$.ajax({
			url:"{{route('del')}}",
			dataType:'json',
			data:{id:kao_id},
			success:function(res){
				if (res.ret=="1") {
					alert(res.msg);
				};
			}
		})
	})
</script>