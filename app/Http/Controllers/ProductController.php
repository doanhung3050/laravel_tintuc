<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index (){
        $data = DB::table('product')->get();
        return view('product.index',['sanpham'=> $data]);
    }
    public function create (){
        return view('product.create');
    }

    public function store (Request $request){
       $validateData =  $request->validate(
        [
            'name' => 'required|unique:product',
            'price' => 'required|integer',
            'description' => 'required',
            'image' => 'required'
        ],
        [
            'name.required' => 'vui long nhap ten',
            'name.unique' => 'ten ko dc trung',
            'price.required' => 'vui long nhap so',
            'price.integer' => 'gia phai la so',
            'description.required' => 'vui long nhap mo ta',
            'image.required' => 'vui long nhap hinh anh',
        ]
    
    );

    if( $validateData) {
    //     $data = array (
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'description' => $request->description,
    //         'status' => $request->status,
    //         'image' => $request->image,

    //     );
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        DB::table('product')->insert($data);

        return redirect()->route('product.index');
   }

    
    }

   
    public function edit ($id){
        $data = DB::table('product')->where('id',$id)->first();
        return view('product.edit',['sanpham' => $data]);
    }

    public function update (Request $request, $id){
        $validateData =  $request->validate(
            [
                'name' => 'required|unique:product,name,'.$id,
                'price' => 'required|integer',
                'description' => 'required',
                'image' => 'required'
            ],
            [
                'name.required' => 'vui long nhap ten',
                'name.unique' => 'ten ko dc trung',
                'price.required' => 'vui long nhap so',
                'price.integer' => 'gia phai la so',
                'description.required' => 'vui long nhap mo ta',
                'image.required' => 'vui long nhap hinh anh',
            ]
        
        );
    
        if( $validateData) {
            $data = $request->except('_token');
            $data['created_at'] = new DateTime();

            DB::table('product')->where('id',$id)->update($data);
    
            return redirect()->route('product.index');
       }
    }
    public function delete ($id){
       DB::table('product')->where('id',$id)->delete();
       return redirect()->route('product.index');
    }
}
