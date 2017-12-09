<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Category;

class CategoryController extends Controller
{
    
//    public function __construct() {
//        $this->middleware('auth');
//    }
    public function createCategory(){
        return view('admin.category.createCategory');
    }
    
    public function storeCategory(Request $request){
        
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' =>'required',
        ]);
        
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect('/category/add')->with('message','Category info Save Successfully');
    }
    
    public function manageCategory(){
        $category = Category::all();
        return view('admin.category.manageCategory',['categoris'=>$category]);
    }
    
    public function editCategory($id){
        $categoryById = Category::where('id',$id)->first();
        return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }
    
        public function updateCategory(Request $request){
   
        $category = Category::find($request->categoryId);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect('/category/manage')->with('message','Category info Updated Successfully');
    }
    
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message','Category info Deleted Successfully');
    }
    
}
