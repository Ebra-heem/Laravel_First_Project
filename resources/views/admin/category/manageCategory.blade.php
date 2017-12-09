@extends('admin.master')
@section('title')
Manage Category
@endsection

@section('main_content')
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Description</th>
      <th scope="col">Publication Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categoris as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->categoryName}}</td>
      <td>{{$category->categoryDescription}}</td>
      <td>{{$category->publicationStatus==1?'Published':'Unpublished'}}</td>
      <td>
          <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
          <a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delet this');"><span class="glyphicon glyphicon-trash"></span></a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection



<!--
@foreach($categoris as $category)
<ul>
    <li>{{$category->categoryName}}</li>
    <li>{{$category->categoryDescription}}</li>
    <li>{{$category->publicationStatus==1?'Published':'Unpublished'}}</li>
</ul>
@endforeach-->