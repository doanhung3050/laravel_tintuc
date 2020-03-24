<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:news|max:200',
            'author' => 'required',
            'intro' => 'required',    
            'content' => 'required',  
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'vui long nhap tieu de',
            'title.unique' => 'ten ko dc trung',
            'author.required' => 'vui long nhap tac gia',
            'intro.required' => 'vui long nhap tom tat',
            'content.required' => 'vui long nhap noi dung',
            'image.required' => 'vui long nhap chon hình ảnh',
            'image.mimes' => 'vui long chọn file hình'
        ];
    }
}
