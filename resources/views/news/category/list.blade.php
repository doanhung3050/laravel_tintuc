@extends('news')
@section('content')
<table class="list_table">
	<tr class="list_heading">
		<td class="id_col">STT</td>
		<td>Danh Mục</td>
		<td class="action_col">Quản lý?</td>
	</tr>
	
   @foreach ($sanpham as $cate)
   <tr class="list_data">
    <td class="aligncenter">{{ $loop->iteration }}</td>
   <td class="list_td alignleft">{{ $cate->name }}</td>
    <td class="list_td aligncenter">
    <a href="{{ route('category.editview',['id' =>$cate->id]) }}"><img src="{{ asset('images/edit.png') }}" /></a>
        <a href="{{ route('category.delete',['id' =>$cate->id]) }}"><img src="{{ asset('images/delete.png') }}" /></a>
    </td>
</tr>

   @endforeach

</table>
@endsection