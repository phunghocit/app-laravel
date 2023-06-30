<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return '<h1>Đây là index<h1>';
    }
    public function detail(){
        return '<h1>Đây là detail<h1>';
        
    }
    public function show($id,$test){
        return "<h1>Đây là Show $id + $test <h1>";
        
    }
}
