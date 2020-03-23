@extends('master');
@section('content')
    
<table border="1px">
    <tr>
        <td>ID</td>
        <td>ten user</td>
        <td>email</td>
        <td>mo ta</td>
        <td>ngay tao</td>
        <td>xoa</td>
        <td>sua</td>
    </tr>
    @foreach ($sanpham as $sp)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $sp->name }}</td>
        <td>{{ $sp->price }}</td>
        <td>{{ $sp->description }}</td>
        <td>{{ date('d-m-Y h:i:s',strtotime($sp->created_at)) }}</td>
        <td><a href="{{ route('product.delete',['id' => $sp->id]) }}">xoa</a></td>
        <td><a href="{{ route('product.edit',['id' => $sp->id]) }}">sua</a></td>
    </tr>
    @endforeach

</table>


@endsection

