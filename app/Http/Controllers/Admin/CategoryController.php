<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

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

    public function cate_edit_view($id){
        $data = DB::table('category')->where('id',$id)->first();

        return view('news.category.edit',['cate' => $data]);
    }

    public function cate_edit(UpdateRequest $request, $id){
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        DB::table('category')->where('id',$id)->update($data);

        return redirect()->route('category.list');
    }

    public function cate_delete($id){
       DB::table('category')->where('id', $id)->delete();
       return redirect()->route('category.list');
    }
}
