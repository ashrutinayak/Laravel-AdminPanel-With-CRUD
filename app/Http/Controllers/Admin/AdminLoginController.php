<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminLoginController extends Controller
{
    // function for login view 
   
    public function login()
    {
        return view('admin/login');
    }
    
    // function for register view 
   
    public function register()
    {
        return view('admin/register');
    }
    
    // function for admin login 

    public function adminlogin(Request $req)
    {
        $email=$req->email;
        $password=$req->password;
        // dd($email);
        $login=User::where('email',$email)->first();
        // dd($login);
        if(!empty($login))
        {
           $password=User::where('password',$password)->first();
           if(!empty($password))
           {
                $name1=$password->name;
                Session::put('name',$name1);
                $name=Session::get('name');
                // dd($name);
                return view('admin/dashbroad')->with('name',$name);
           } 
           else{
               $error="Password is no match";
               return view('admin/login')->with('error',$error);
           }
        }
        else
        {
            $error="Email id is wrong.";
            return view('admin/login')->with('error', $error);
        }
    }
    
    // function for addcategory view

    public function addcategory()
    {
        $name=Session::get('name');
        if(empty($name))
        {
            return view('admin.login');
        }
        else
        {
            return view('admin.addcategory')->with('name',$name);
        }   
    }
    
// function for category add in table

public function addcat(Request $req)
{
    $name=Session::get('name');
    if(empty($name))
    {
        return view('admin.login');
    }
    else
    {
        
        $category=new Category();
        $category->name=$req->categoryname;
        // dd($category->name);
        $category->save();
        $msg="Category Insert successfully";
        return Redirect::route('viewcategory')->with('msg',$msg);
    }
}
// function for category view from table
public function viewcategroy()
{
    $name=Session::get('name');
    if(empty($name))
    {
        return view('admin.login');
    }
    else
    {
        $cat=Category::all();
        return view('admin.viewcategory')->with(['category'=>$cat,"name"=>$name]);
    }
    
}

// function for category edit from table with edit form

public function editcategory($id)
{
    $name=Session::get('name');
    if(empty($name))
    {
        return view('admin.login');
    }
    else
    {
        $cate=Category::find($id);
        // dd($cate);
        if(empty($cate))
        {
            $cat=Category::all();
            return view('admin.viewcategory')->with(['category'=>$cat,"name"=>$name]);
        }
        else
        {
            // dd($cate->id);
            return view('admin.editcategory')->with(['cat'=>$cate,"name"=>$name]);
        }
        
    }
   
}
public function updatecategory(Request $req)
{
    // dd($req);
    $name=Session::get('name');
    if(empty($name))
    {
        return view('admin.login');
    }
    else
    {
        $cat=Category::where('id',$req->cat_id)->first();
        // dd($cat);
        $cat->name=$req->categoryname;
        $cat->save();
        return redirect()->action('Admin\AdminLoginController@viewcategroy')->with(["update"=>'Category updated successfully']);
    }
}


// function for delete category

public function deletecategory($id)
{
    $user = category::where('id',$id)->first();
    $user->delete();
    return redirect()->action('Admin\AdminLoginController@viewcategroy');
}

//  function for logout

    public function logout()
    {
        session()->flush();
        return view('admin/index');
    }
}
