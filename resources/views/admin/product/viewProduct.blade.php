@extends('admin.master')
@section('title')
View Product
@endsection


@section('main_content')

<hr>
<table class="table table-bordered table-hover">
  
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">{{$product->id}}</th>
    </tr>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">{{$product->productName}}</th>
    </tr> <tr>
     <tr>
      <th scope="col">Category Name</th>
      <th scope="col">{{$product->categoryName}}</th>
    </tr>
     <tr>
      <th scope="col">Manufacturar Name</th>
      <th scope="col">{{$product->manufacturarName}}</th>
    </tr>
     <tr>
      <th scope="col">Product Price</th>
      <th scope="col">{{$product->productPrice}}</th>
    </tr>
     <tr>
      <th scope="col">Product Quantity</th>
      <th scope="col">{{$product->productQuantity}}</th>
    </tr> 
    <tr>
      <th scope="col">Product Short Description</th>
      <th scope="col">{!! $product->productShortDescription !!}</th>
    </tr>
    
    <tr>
      <th scope="col">Product Long Description</th>
      <th scope="col">{!! $product->productLongDescription !!}</th>
    </tr>
     <tr>
      <th scope="col">Product Image</th>
      <th scope="col"><img src="{{asset($product->productImage)}}" alt="{{$product->productName}}" heigth="200" width="200"></th>
    </tr>
     <tr>
      <th scope="col">Product Publication Status</th>
      <th scope="col">{{$product->publicationStatus==1?'Published':'Unpublished'}}</th>
    </tr> 
    
</table>
<a href="{{url('/product/manage')}}" class="btn btn-lg btn-flickr btn-primary"><span class="glyphicon glyphicon-backward" title="Back"></span></a>


@endsection


