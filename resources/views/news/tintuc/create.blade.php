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

<form action="{{ route('news.create') }}" method="POST" enctype="multipart/form-data" style="width: 650px;">
    @csrf
    <fieldset>
		<legend>Thông Tin Bản Tin</legend>
		<span class="form_label">Tên danh mục:</span>
		<span class="form_item">
			<select name="category_id" class="select">
                <option value="none">Chọn danh mục</option>
                @foreach ($cate as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
				@endforeach
				
			</select>
		</span><br />
		<span class="form_label">Tiêu đề tin:</span>
		<span class="form_item">
			<input type="text" name="title" class="textbox" value="{{ old('title') }}"/>
		</span><br />
		<span class="form_label">Tác gỉả:</span>
		<span class="form_item">
			<input type="text" name="author" class="textbox" value="{{ old('author') }}" />
		</span><br />
		<span class="form_label">Trích dẫn:</span>
		<span class="form_item">
			<textarea name="intro" rows="5" class="textbox">
				{{ old('intro') }}

            </textarea>		
			
		</span><br />
		<span class="form_label">Nội dung tin:</span>
		<span class="form_item">
			<textarea name="content" rows="8" class="textbox">
				{{ old('content') }}
            </textarea>
			
		</span><br />
		<span class="form_label">Hình đại diện:</span>
		<span class="form_item">
			<input type="file" name="image" class="textbox" />
		</span><br />
		<span class="form_label">Công bố tin:</span>
		<span class="form_item">
			<input type="radio" name="status" value="1" checked="checked" /> Có 
			<input type="radio" name="status" value="0" /> Không
		</span><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" value="Thêm tin" class="button" />
		</span>
	</fieldset>
</form>



@endsection