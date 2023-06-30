<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    //
    public function index(){
        return view('admin.product.product_category.list_category');
    }
}
