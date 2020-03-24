@extends('news')
@section('content')
<table class="list_table">
<tr class="list_heading">
    <td class="id_col">STT</td>
    <td>Tiêu Đề</td>
    <td>Tác Giả</td>
    <td>Thời Gian</td>
    <td class="action_col">Quản lý?</td>
</tr>
@foreach ($tintuc as $item)
<tr class="list_data">
    <td class="aligncenter">{{ $loop->iteration }}</td>
    <td class="list_td aligncenter">{{ $item->title }}</td>
    <td class="list_td aligncenter">{{ $item->author }}</td>
    <td class="list_td aligncenter">{{ $item->created_at }}</td>
    <td class="list_td aligncenter">
        <a href="{{ route('news.editview',['id' => $item->id]) }}"><img src="{{ asset('images/edit.png') }}" /></a>
        <a href="{{ route('news.delete',['id' => $item->id]) }}"><img src="{{ asset('images/delete.png') }}" /></a>
    </td>
</tr>
@endforeach
   

</table>
@endsection