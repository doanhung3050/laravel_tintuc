@extends('master');
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('user.update',['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="{{ old('name',$user->name) }}"></td>
        </tr>

        <tr>
            <td>email</td>
            <td><input type="text" name="email" value="{{ old('email',$user->email) }}" ></td>
        </tr>

        <tr>
            <td>password</td>
            <td> <input type="password" id="pass" name="password"></td>
        </tr>
    
        <tr>
            <td>xac nhan mat khau</td>
            <td> <input type="password" id="pass" name="password_confirmation"></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">edit</button>
            </td>
        </tr>

        

    </table>


</form>
@endsection

