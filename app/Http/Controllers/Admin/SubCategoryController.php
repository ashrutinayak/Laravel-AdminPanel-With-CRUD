<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use DB;
use App\Subcategory;
class SubCategoryController extends Controller
{

    // Function for view add subcategory form
    public function addsubcategory()
    {
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $category = Category::all();
            return view('admin.addsubcategory')->with(['name'=>$name,"category"=>$category]);
        }   
    }

    // Function for add subcategory 

    public function addsubcat(Request $req)
    {
        // dd($req);
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $subcategory=new Subcategory();
            $subcategory->subname=$req->subcategoryname;
            $subcategory->catid=$req->drpcat;
            // dd($category->name);
            $subcategory->save();
            $msg="SubCategory Insert successfully";
            return Redirect::route('viewsubcategory')->with('msg',$msg);
        }
    }

// Function for view subcategory

    public function viewsubcategory()
    {
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $subcategory = Subcategory::with('getcategory')->get();

            //  $subcat=DB::table('subcategory')
            // ->join('category','category.id','=','subcategory.catid')
            // ->select('subcategory.subid','subcategory.subname','subcategory.catid','category.name')
            // ->get();
            // return $subcat;
            return view('admin.viewsubcategory')->with(['subcategory'=>$subcategory,"name"=>$name]);
        }
    }

// Function for edit subcategory view
    public function editsubcategory($id)
    {
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $cate=Subcategory::with('getcategory')->find($id);
            // dd($cate);
            if(empty($cate))
            {
                $cat=Subcategory::with('getcategory')->get();
                return view('admin.viewsubcategory')->with(['category'=>$cat,"name"=>$name]);
            }
            else
            {
                $sub=Category::all();
                return view('admin.editsubcategory')->with(['subcat'=>$cate,"name"=>$name,'sub'=>$sub]);
            }
            
        }
    }

    public function updatesubcategory(Request $req)
    {
        // dd($req);
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            $subcat=subcategory::where('subid',$req->subcat_id)->first();
            // dd($cat);
            $subcat->catid=$req->drpcat;
            $subcat->subname=$req->subcategoryname;
            $subcat->save();
            return redirect()->action('Admin\SubCategoryController@viewsubcategory')->with(["update"=>'SubCategory updated successfully']);
        }
    }

// Function for delete subcategory
    
    public function deletesubcategory($id)
    {
        $user = Subcategory::where('subid',$id)->first();
        $user->delete();
        return redirect()->action('Admin\SubCategoryController@viewsubcategory');
    }
}
