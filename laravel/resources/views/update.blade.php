<form action="{{url('kao/update_do/'.$data->kao_id)}}" method="post" enctype="multipart/form-data">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@csrf
	<p>网站名称:<input type="text" name="kao_name" value="{{$data->kao_name}}">
		@php echo $errors->first('kao_name') @endphp
	</p>
	
	<p>网站网址:<input type="text" name="kao_url" value="{{$data->kao_url}}">
		@php echo $errors->first('kao_url') @endphp
	</p>
	<p>
		链接类型:<input type="radio" name="is_logo" value="1" @if($data->is_logo=="1") checked="checked"@endif>LOGO链接
				 <input type="radio" name="is_logo" value="0" @if($data->is_logo=="0") checked="checked"@endif>文字链接
	</p>
	<p>图片LOGO:<input type="file" name="kao_img">
		<input type="hidden" name="oidimg"  value="{{$data->kao_img}}">
	</p>
	<p>网站介绍: <textarea name="kao_content">{{$data->kao_content}}</textarea></p>
	<p>是否显示:
		<input type="radio" name="is_show" value="1" @if($data->is_logo=="1") checked="checked"@endif>是
		<input type="radio" name="is_show" value="0" @if($data->is_logo=="0") checked="checked"@endif>否
	</p>
	<p><input type="submit" class="sub"></p>
</form>
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
<script type="text/javascript">
	$('.sub').on('click',function(){
		//网站名称
		var kao_name=$('[name="kao_name"]').val();
		//网站名称
		if (kao_name=="") {
			alert('网站名称不能为空');
			return false;
		};
		//正则验证网站名称
		var rr =/^[\u4e00-\u9fa5A-Za-z0-9_]*$/;
		//判断正则
		if (!rr.test(kao_name)) {
			alert('网站名称为中文字母数字下划线');
			return false;
		};
		var kao_id ={{$data->kao_id}};
		var flag =true;
		//唯一性
		$.ajax({
			url:"{{route('wei')}}",
			data:{kao_name:kao_name,kao_id:kao_id},
			type:"post",
			dataType:"json",
			async:false,
			headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	},
			success:function(res){
				if (res.ret=="1") {
					alert(res.msg);
					flag =false;
				};
			}
		})
		if (!flag) {
			return false;
		};
		//网址
		var kao_url=$('[name="kao_url"]').val();
		//网址
		if (kao_url=="") {
			alert('网址名称不能为空');
			return false;
		};
		//网址正则
		var r2 =/^((http):\/\/)/;
		if (!r2.test(kao_url)) {
			alert('网址必须为http://开头');
			return false;
		};

	})
</script>