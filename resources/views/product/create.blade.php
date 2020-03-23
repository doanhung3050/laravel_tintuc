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
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="{{ old('name') }}"></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><input type="text" name="price" value="{{ old('price') }}" ></td>
        </tr>

        <tr>
            <td>description</td>
            <td><textarea name="description">{{ old('description') }}</textarea></td>
        </tr>

        <tr>
            <td>status</td>
            <td>
                <input type="radio" name="status" checked value="0">Show
                <input type="radio" name="status" value="1">Hide
            </td>
        </tr>

        <tr>
            <td>image</td>
            <td><input type="file" name="image" id=""></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">create</button>
            </td>
        </tr>

        

    </table>


</form>   



@endsection

