<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/index');
});

// Login Route

Route::get('/login', 'Admin\AdminLoginController@login')->name('login');
Route::post('/adminlogin', 'Admin\AdminLoginController@adminlogin')->name('adminlogin');

// register route 

Route::get('/register', 'Admin\AdminLoginController@register')->name('register');

// logout routes

Route::get('logout','Admin\AdminLoginController@logout')->name('logout');

// add category

Route::get('addcategory','Admin\AdminLoginController@addcategory')->name('addcategory');
Route::post('addcat','Admin\AdminLoginController@addcat')->name('addcat');

// view Category route

Route::get('viewcategory','Admin\AdminLoginController@viewcategroy')->name('viewcategory');

// update Category route

Route::get('editcategory/{id}','Admin\AdminLoginController@editcategory')->name('editcategory');
Route::post('updatecategory','Admin\AdminLoginController@updatecategory')->name('updatecategory');

// delete category route

Route::get('deletecategory/{id}','Admin\AdminLoginController@deletecategory')->name('deletecategory');

// add subcategory route

Route::get('addsubcategory','Admin\SubCategoryController@addsubcategory')->name('addsubcategory');
Route::post('addsubcat','Admin\SubCategoryController@addsubcat')->name('addsubcat');

//View Subcategory route 

Route::get('viewsubcategory','Admin\SubCategoryController@viewsubcategory')->name('viewsubcategory');

// Route Edit subcategory

Route::get('editsubcategory/{id}','Admin\SubCategoryController@editsubcategory')->name('editsubcategory');
Route::post('updatesubcategory','Admin\SubCategoryController@updatesubcategory')->name('updatesubcategory');

// Delete Subcategory Route

Route::get('deletesubcategory/{id}','Admin\SubCategoryController@deletesubcategory')->name('deletesubcategory');

// Route For add Product

Route::get('addproduct','Admin\ProductController@addproduct')->name('addproduct');
Route::get('get-subcat-list','Admin\ProductController@getsubcategoryList');
Route::post('addpro','Admin\ProductController@addpro')->name('addpro');

// Route For View Product

Route::get('viewproduct','Admin\ProductController@viewproduct')->name('viewproduct');

// Route for edit Product

Route::get('editproduct/{id}','Admin\ProductController@editproduct')->name('editproduct');
Route::post('updateproduct','Admin\ProductController@updateproduct')->name('updateproduct');

// Route For Delete Product

Route::get('deleteproduct/{id}','Admin\ProductController@deleteproduct')->name('deleteproduct');