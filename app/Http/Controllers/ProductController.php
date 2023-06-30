<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $arrayProduct =[
            ['id'=>3,'name'=>'Product A','price'=> 30000],
            ['id'=>6,'name'=>'Product B','price'=> 35000],
            ['id'=>9,'name'=>'Product C','price'=> 40000],
            ['id'=>12,'name'=>'<b>Product D</b>','price'=> 22000],
        ];
        //Cach 1
        return view('user.list_user_blade',['arrayProduct' =>$arrayProduct,
    'test'=>'aaaaaaaaaa']);
        //Cach 2
        // return view('user.list_user_blade')->with('arrayProduct',$arrayProduct);
        //Cach 3
        // return view('user.list_user_blade',compact('arrayProduct'));

    }
}
