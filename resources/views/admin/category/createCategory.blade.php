@extends('admin.master')
@section('title')
@endsection
@section('main_content')
<div class="jumbotron">
    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
    <hr>


    {!!Form::open(['url'=>'/category/save','method'=>'POST','class'=>'form-horizontal'])!!}

    <fieldset>
        <div class="form-group row {{ $errors->has('categoryName') ? ' has-error' : '' }}">
            <label for="inputPassword" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="inputPassword" name="categoryName">
                @if($errors->has('categoryName'))
                <span class="help-block">
                    <strong>{{ $errors->first('categoryName') }}</strong>
                </span>
                @endif
            </div>

        </div>
        <div class="form-group row {{ $errors->has('categoryDescription') ? ' has-error' : '' }}">

            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Category Description</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3" name="categoryDescription"></textarea>
                @if($errors->has('categoryDescription'))
                <span class="help-block">
                    <strong>{{ $errors->first('categoryDescription') }}</strong>
                </span>
                @endif
            </div>

        </div>
        <div class="form-group row {{ $errors->has('publicationStatus') ? ' has-error' : '' }}">
            <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Publication Status</label>
            <div class="col-sm-10">
                <select class="custom-select form-control form-control-lg " id="exampleFormControlSelect2" name="publicationStatus">
                    <option selected>--Select Publication Status--</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>

                </select>
                @if($errors->has('publicationStatus'))
                <span class="help-block">
                    <strong>{{ $errors->first('publicationStatus') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success form-control">Add Category</button>
            </div>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>

@endsection
