<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    public function luuNguoiDung(Request $request){
        // dd($request->all());
        $request ->validate([
            'name' => 'required|min:3|max:255',           
            'email' =>'required|min:3|max:255|email',
            'password' =>'required|min:3|max:255',
        ],[
            'name.required' => "Name là bắt buộc",
            'name.min' => "Name ít nhất 3 ký tự",
            'name.max' => "Name ít nhất 255 ký tự",
            'email.required' => "Email là bắt buộc",
            'email.min' => "Email ít nhất 3 ký tự",
            'email.max' => "Email ít nhất 255 ký tự",
            'email.email' => "Email không đúng định dạng",
            'password.required' => "Password là bắt buộc",
            'password.min' => "Password ít nhất 3 ký tự",
            'password.max' => "Password ít nhất 255 ký tự",
        ]);
        $password = Hash::make($request->password);

        $check = DB::insert('INSERT INTO nguoidung ( name, email, password )
         VALUES (?, ?, ?)', [$request->name, $request->email,$password]);
        // dd($check);
        return redirect()->route('home')->with('message','Đăng ký thành công');
    }
    public function dangnhap(Request $request){
        // dd($request->all());
        $request ->validate([
            'email' =>'required|min:3|max:255|email',
            'password' =>'required|min:3|max:255',
        ],[
            'email.required' => "Email là bắt buộc",
            'email.min' => "Email ít nhất 3 ký tự",
            'email.max' => "Email ít nhất 255 ký tự",
            'email.email' => "Email không đúng định dạng",
            'password.required' => "Password là bắt buộc",
            'password.min' => "Password ít nhất 3 ký tự",
            'password.max' => "Password ít nhất 255 ký tự",
        ]);
         $user = DB::select("SELECT * FROM nguoidung WHERE email= ?",[$request->email] );
         if (count($user) && Hash::check($request->password,$user[0]->password)) {
            session()->push ('user',['id'=>$user[0]->id,'email'=>$user[0]->email,'name'=>$user[0]->name]);
            // $request->session()->flush();
            return redirect()->route('home');
         }
        return back()->with('error','Email hoặc password không đúng'); //Muốn dùng with error thì bên trang đăng nhập phải có hàm gọi ra error
    }
    public function dangxuat(){
       
        // session()->flush(); // xoá mọi dữ liệu
        session()->forget('user');
        
        return redirect()->route('nguoidung.dangnhap');
    }
}
