@extends('news')
@section('content')
<table class="function_table" style="margin: 0px auto;">
	<tr>
		<td class="function_item user_add"><a href="{{ route('news.newview') }}">Thêm user</a></td>
		<td class="function_item user_list"><a href="index.php?p=danh-sach-thanh-vien">Quản lý user</a></td>
		<td rowspan="3" class="statistics_panel">
			<h3>Thống kê:</h3>
			<ul>
				<li>Tổng số user:</li>
				<li>Tổng số danh mục:</li>
				<li>Tổng số tin:</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td class="function_item cate_add"><a href="{{ route('category.addview')}}">Thêm danh mục</a></td>
		<td class="function_item cate_list"><a href="{{ route('category.list')}}">Quản lý danh mục</a></td>
	</tr>
	<tr>
		<td class="function_item news_add"><a href="{{ route('news.newview')}}">Thêm tin</a></td>
		<td class="function_item news_list"><a href="{{ route('news.list') }}">Quản lý tin</a></td>
	</tr>  
</table>
@endsection