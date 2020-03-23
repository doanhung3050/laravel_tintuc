@extends('master');
@section('content')
    
<table border="1px">
    <tr>
        <td>ID</td>
        <td>ten</td>
        <td>email</td>
        <td>ngay tao</td>
        <td>xoa</td>
        <td>sua</td>
    </tr>
    @foreach ($user as $sp)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $sp->name }}</td>
        <td>{{ $sp->email }}</td>
        <td>{{ date('d-m-Y h:i:s',strtotime($sp->created_at)) }}</td>
        <td><a href="{{ route('user.delete',['id' => $sp->id]) }}">xoa</a></td>
        <td><a href="{{ route('user.edit',['id' => $sp->id]) }}">sua</a></td>
    </tr>
    @endforeach

</table>


@endsection

