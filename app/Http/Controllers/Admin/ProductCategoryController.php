<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:255|string|unique:product_category,name',
            'slug'=>'required|min:5|max:255|string',
            'status'=>'required|boolean',
        ],
        [
            'name.required' => 'Tên buộc phải nhập!',
            'name.min' => 'Tên phải dài ít nhất 3 tứ tự và không quá 255 kí tự',
            'name.string' => 'Tên sai định dạng!',

        ]);
        // dd($request);
        // sql RAW
        // $check = DB::insert('INSERT INTO product_category (name,slug,status) VALUES (?,?,?)',[$request->name,$request->slug,$request->status]);
        //Query builder
        $check = DB::table('product_category')->insert([
            'name'=>$request->name,
            // 'slug'=>$request->slug,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status,

        ]);
        // $lastID = DB::table('product_category')->insertGetId([
        //     'name'=>$request->name,
        //     'slug'=>$request->slug,
        //     'status'=>$request->status,

        // ]);
        $msg = $check ? 'Create Product Category Success' :'Create Product Category Failed';
        return redirect()->route('admin.product_category.list')->with('message',$msg); 
    }
   
    public function update(Request $request, $id){
        // dd($request,$id);
        $request->validate([
            'name'=>'required|min:3|max:255|string|unique:product_category,name,'.$id,
            'slug'=>'required|min:5|max:255|string',
            'status'=>'required|boolean',
        ],
        [
            'name.required' => 'Tên buộc phải nhập!',
            'name.min' => 'Tên phải dài ít nhất 3 tứ tự và không quá 255 kí tự',
            'name.string' => 'Tên sai định dạng!',

        ]);
        // dd($request);
        // sql RAW
        // $check = DB::insert('INSERT INTO product_category (name,slug,status) VALUES (?,?,?)',[$request->name,$request->slug,$request->status]);
  
            // $check = DB::update('UPDATE product_category set name=?, slug=?, status=? where id = ?',[$request->name,$request->slug,$request->status,$id]);
             //Query builder
             $check = DB::table('product_category')
             ->where('id',$id)
             ->update([
                'name'=>$request->name,
                'slug'=>$request->slug,
                'status'=>$request->status,
    
            ]);
            $msg = $check ? 'Update Product Category Success' :'Update Product Category Failed';
        return redirect()->route('admin.product_category.list')->with('message',$msg); 
    }

    public function destroy($id){
        //SQL RAW
        //Query Builder
        $check=DB::table('product_category')->where('id',$id)->delete();
        $msg = $check ? 'Delete Success' :'Delete Failed';
        return redirect()->route('admin.product_category.list')->with('message',$msg); 
    }
  
    public function getslug(Request $request){
        // dd($request);
        $slug=Str::slug($request->name);
        return response()->json(['slug'=>$slug]);
    }
    public function index(Request $request){
        // $page =$request->page ?? 1; //số trang sẽ mặc định là 1 nếu ko truyền zo
        // // $itemPerPage= env('ITEM_PER_PAGE'); // số record muốn xuất hiện  // bằng cách cấu hình ở file ENV
        // $itemPerPage= config('myconfig.item_per_page'); // số record muốn xuất hiện  // BẰNG cách cấu hình Config
        // $pageFirst = ($page -1) *$itemPerPage;

        // $query=DB::select('select * from product_category');
        // $numberOfPage=ceil(count($query) / $itemPerPage);
        // $productCategories=DB::select("select * from product_category limit $pageFirst,$itemPerPage");

        $productCategories=DB::table("product_category")->paginate(config('myconfig.item_per_page'));

        return view('admin.product_category.list',compact('productCategories'));
    }
    public function detail($id){
        $productCategory=DB::select('select * from product_category where id=?',[$id]);
        return view('admin.product_category.detail',['productCategory'=>$productCategory]);
    }
}
