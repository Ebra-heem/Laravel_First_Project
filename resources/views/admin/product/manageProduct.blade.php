@extends('admin.master')
@section('title')
Manage Product
@endsection

@section('main_content')
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Manufacturar Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Publication Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->productName}}</td>
      <td>{{$product->categoryName}}</td>
      <td>{{$product->manufacturarName}}</td>
      <td>{{$product->productPrice}}</td>
      <td>{{$product->productQuantity}}</td>
      
      <td>{{$product->publicationStatus==1?'Published':'Unpublished'}}</td>
      <td>
          <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" title="Product View"></span></a>
          <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-edit" title="Product Edit"></span></a>
          <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delet this');" title="Product Delete"><span class="glyphicon glyphicon-trash"></span></a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection

