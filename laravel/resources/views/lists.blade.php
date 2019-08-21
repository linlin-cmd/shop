<table border="1">
	<tr>
		<td>姓名</td>
		<td>年龄</td>
		<td>性别</td>
		<td>操作</td>
	</tr>
@foreach($data as $v)
	<tr>
		<td>{{$v->name}}</td>
		<td>{{$v->age}}</td>
		<td>
			@if($v->sex=="0")男
			@else 女
			@endif
		</td>
		<td>
			<a href="{{url('/student/update/'.$v->s_id)}}">修改</a>
			<a href="{{url('/student/delete/'.$v->s_id)}}">删除</a>
		</td>
	</tr>
@endforeach
</table>
