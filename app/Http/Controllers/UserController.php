<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index (){
        $data = DB::table('users')->get();
        return view('user.index',['user' => $data ]);
    }
    public function create (){

        return view('user.create');
    }

    public function store (Request $request){
        $validateData =  $request->validate(
            [
                'name' => 'required|unique:users',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ],
            [
                'name.required' => 'vui long nhap ten',
                'name.unique' => 'ten ko dc trung',
                'email.required' => 'vui long nhap email',
                'email.email' => 'vui long nhap dung dinh dang email',
                'password.required' => 'vui long nhap passs',
                'password_confirmation.required' => 'vui xac nhan pass',
                'password.confirmed' => 'mat khau khong trung xin nhap lai',
            ]
        
        );
      if ($validateData){
        $data = $request->except('_token','password_confirmation');
        $data['created_at'] = new DateTime();
        DB::table('users')->insert($data);

        return redirect()->route('user.index');
      } 
      
    }

    public function edit ($id){
        $data = DB::table('users')->where('id',$id)->first();
        return view('user.edit',['user' => $data]);
      
    }

    public function update (Request $request, $id){
        $validateData =  $request->validate(
            [
                'name' => 'required|unique:users,name,'.$id,
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ],
            [
                'name.required' => 'vui long nhap ten',
                'name.unique' => 'ten ko dc trung',
                'email.required' => 'vui long nhap email',
                'email.email' => 'vui long nhap dung dinh dang email',
                'password.required' => 'vui long nhap passs',
                'password_confirmation.required' => 'vui xac nhan pass',
                'password.confirmed' => 'mat khau khong trung xin nhap lai',
            ]
        
        );
    
        if( $validateData) {
            $data = $request->except('_token','password_confirmation');
            $data['created_at'] = new DateTime();
            DB::table('users')->where('id',$id)->update($data);
    
            return redirect()->route('user.index');
        }
    }


    public function delete ($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('user.index');
    }
}
