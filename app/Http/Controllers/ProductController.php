<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturar;
use App\Product;
use DB;

class ProductController extends Controller {

    public function createProduct() {
        $category = Category::where('publicationStatus', 1)->get();
        $manufacturar = Manufacturar::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct', ['categories' => $category], ['manufacturars' => $manufacturar]);
    }

    public function storeProduct(Request $request) {
        //return $request->all();
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required',
        ]);

        $productImage = $request->file('productImage');
        $name = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath, $name);
        $imageUrl = $uploadPath . $name;
        $this->saveProductInfo($request, $imageUrl);
        return redirect('/product/add')->with('message', 'Product Save Successfully');
    }

    protected function saveProductInfo($request, $imageUrl) {
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturarId = $request->manufacturarId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function manageProduct() {
        $products = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturars', 'products.manufacturarId', '=', 'manufacturars.id')
                ->select('products.*', 'categories.categoryName', 'manufacturars.manufacturarName')
                ->get();

        return view('admin.product.manageProduct', ['products' => $products]);
    }

    public function viewProduct($id) {
        $productById = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturars', 'products.manufacturarId', '=', 'manufacturars.id')
                ->select('products.*', 'categories.categoryName', 'manufacturars.manufacturarName')
                ->where('products.id', $id)
                ->first();

        return view('admin.product.viewProduct', ['product' => $productById]);
    }

    public function editProduct($id) {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturars = Manufacturar::where('publicationStatus', 1)->get();
        $productById = Product::where('id', $id)->first();

        return view('admin.product.editProduct', ['productById' => $productById], ['categories' => $categories])->with('manufacturars', $manufacturars);
    }

    public function updateProduct(Request $request) {

   
        $imageUrl = $this->imageExistStatus($request);
        $product = Product::find($request->productId);
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturarId = $request->manufacturarId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        
        
        $product->publicationStatus = $request->publicationStatus;
        
        $product->save();
         return redirect('/product/manage')->with('message','Product info Updated Successfully');
    }

    private function imageExistStatus($request) {
        $productById = Product::where('id', $request->productId)->first();
        $productImage = $request->file('productImage');
        if ($productImage) {
            unlink($productById->productImage);
            
            $name = $productImage->getClientOriginalName();
            $uploadPath = 'public/productImage/';
            $productImage->move($uploadPath, $name);
            $imageUrl = $uploadPath.$name;
           
        } else {
            
            $imageUrl = $productById->productImage;
            
        }
        return $imageUrl;
    }
    
    public function deleteProduct($id){
        $product= Product::find($id);
        $product->delete();
        return redirect('/product/manage')->with('message','Product info Deleted Successfully');
    }

}
