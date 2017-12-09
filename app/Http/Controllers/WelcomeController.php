<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class WelcomeController extends Controller
{
    public function index(){
        $publishedProducts=Product::where('publicationStatus',1)->get();
        return view('fontEnd.home.homeContent',['publishedProducts'=>$publishedProducts]);
    }
    public function category($id){
        $publishedCategoryProducts = Product::where('categoryId',$id)
                                     ->where('publicationStatus',1)
                                     ->get();
        return view('fontEnd.category.categoryContent',['publishedCategoryProducts'=>$publishedCategoryProducts]);
    }
    public function productDetails($id){
        $publishedProductDetails = Product::where('id',$id)->first();
          
        //return $publishedProductDetails;
        return view('fontEnd.product.productContent',['publishedProductDetails'=>$publishedProductDetails]);
    }
    public function contactUs(){
        return view('fontEnd.contact.contactContent');
    }
}
