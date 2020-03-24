<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    public function cate_list(){
       $data =  DB::table('category')->get();
        return view('news.category.list',['sanpham'=> $data]);
    }

    public function cate_addview(){

        return view('news.category.add');
    }

    public function cate_add(StoreRequest $request){
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        DB::table('category')->insert($data);
        return redirect()->route('category.list');
    }

    public function cate_edit(){
        
    }
}
