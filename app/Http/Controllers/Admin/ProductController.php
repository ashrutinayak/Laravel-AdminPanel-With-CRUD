<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use DB;
use App\Subcategory;
use App\Product;

class ProductController extends Controller
{
    public function addproduct()
    {
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $category = Category::all();
            $subcat = Subcategory::all();
            return view('admin.addproduct')->with(['name'=>$name,"category"=>$category,"subcategory"=>$subcat]);
        }   
    }
    public function getsubcategoryList(Request $request)
        {

            $subcat = DB::table("subcategory")
            ->where("catid",$request->cat_id)
            ->pluck("subname","subid");
            // $subcat = Subcategory::where("catid",$request->cat_id)->get();
            return response()->json($subcat);
        }
    
    public function addpro(Request $req)
    {
        // dd($req);
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $product=new Product();
            $product->catid=$req->drpcat;
            $product->subcatid=$req->drpsubcat;
            $product->productname=$req->productname;
            // dd($category->name);
            $product->save();
            $msg="Product Insert successfully";
            return Redirect::route('viewproduct')->with('msg',$msg);
        }
    }    
    public function viewproduct()
    {
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $product = Product::with(['getsubcategory','getcategory'])->get();
            // return $product;
            //  $subcat=DB::table('subcategory')
            // ->join('category','category.id','=','subcategory.catid')
            // ->select('subcategory.subid','subcategory.subname','subcategory.catid','category.name')
            // ->get();
            // return $subcat;
            return view('admin.viewproduct')->with(['product'=>$product,"name"=>$name]);
        }
    }
    public function editproduct($id)
    {
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $cate=Product::with(['getsubcategory','getcategory'])->find($id);
            // dd($cate);
            if(empty($cate))
            {
                $cat=Product::with(['getsubcategory','getcategory'])->get();
                return view('admin.viewproduct')->with(['product'=>$product,"name"=>$name]);
            }
            else
            {
                $sub=Category::all();
                return view('admin.editproduct')->with(['product'=>$cate,"name"=>$name,'sub'=>$sub]);
            }
            
        }
    }

    public function updateproduct(Request $req)
    {
        // dd($req);
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $pro=Product::where('productid',$req->product_id)->first();
            // dd($cat);
            $pro->catid=$req->drpcat;
            $pro->subcatid=$req->drpsubcat;
            $pro->productname=$req->productname;
            $pro->save();
            return redirect()->action('Admin\ProductController@viewproduct')->with(["update"=>'SubCategory updated successfully']);
        }
    }
    public function deleteproduct($id)
    {
        $user = Product::where('productid',$id)->first();
        $user->delete();
        return redirect()->action('Admin\ProductController@viewproduct');
    }
}
