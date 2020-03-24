<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;

class NewsController extends Controller
{
    public function news_list(){
        $data = DB::table('news')->get();
        return view('news.tintuc.list',['tintuc' =>$data]);
    }

    public function news_newview(){
        $data =  DB::table('category')->get();
        return view('news.tintuc.create',['cate' => $data]);
    }

    public function news_create(CreateRequest $request){
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        DB::table('news')->insert($data);

        return redirect()->route('news.list');
    }

    public function news_edit_view($id){
        $data = DB::table('news')->where('id',$id)->first();
        $danhmuc = DB::table('category')->get();
        return view('news.tintuc.edit',[
                                        'tintuc' => $data,
                                        'cate' => $danhmuc
                                        ]);
    }

    public function news_edit(UpdateRequest $request, $id){
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        DB::table('news')->where('id',$id)->update($data);
        return redirect()->route('news.list');
    }

    public function news_delete($id){
        DB::table('news')->where('id', $id)->delete();
        return redirect()->route('news.list');
    }
}
