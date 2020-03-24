@extends('news')
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
<form action="{{ route('category.add') }}" method="POST" style="width: 650px;">
    @csrf
    <fieldset>
        <legend>Thông Tin Danh Mục</legend>
        <span class="form_label">Tên danh mục:</span>
        <span class="form_item">
            <input type="text" name="name" class="textbox" />
        </span><br />
        <span class="form_label"></span>
        <span class="form_item">
            <input type="submit" value="Thêm danh mục" class="button" />
        </span>
    </fieldset>
</form>  
@endsection