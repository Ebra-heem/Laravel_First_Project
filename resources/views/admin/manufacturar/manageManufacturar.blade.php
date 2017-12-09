@extends('admin.master')
@section('title')
Manage Manufacturar
@endsection

@section('main_content')
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Manufacturar Name</th>
      <th scope="col">Manufacturar Description</th>
      <th scope="col">Publication Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($manufacturars as $manufacturar)
    <tr>
      <th scope="row">{{$manufacturar->id}}</th>
      <td>{{$manufacturar->manufacturarName}}</td>
      <td>{{$manufacturar->manufacturarDescription}}</td>
      <td>{{$manufacturar->publicationStatus==1?'Published':'Unpublished'}}</td>
      <td>
          <a href="{{url('/manufacturar/edit/'.$manufacturar->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
          <a href="{{url('/manufacturar/delete/'.$manufacturar->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delet this');"><span class="glyphicon glyphicon-trash"></span></a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection



