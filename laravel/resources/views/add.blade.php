<form action="{{route('do')}}" method="post">
	@csrf
	<p>姓名: <input type="text" name="name"></p>
	<p>年龄: <input type="number" name="age"></p>
	<p>性别: 
		<input type="radio" name="sex" value="0"> 男
		<input type="radio" name="sex" value="1"> 女
	</p>
	<p><button>提交</button></p>
</form>