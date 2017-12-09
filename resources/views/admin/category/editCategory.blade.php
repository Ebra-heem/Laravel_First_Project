@extends('admin.master')
@section('title')
Edit Category
@endsection
@section('main_content')
<div class="jumbotron">
    
    <hr>

    {!!Form::open(['url'=>'/category/update','method'=>'POST','class'=>'form-horizontal','name'=>'editCategoyForm'])!!}

    <fieldset>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="inputPassword" name="categoryName" value="{{$categoryById->categoryName}}">
                <input type="hidden" class="form-control form-control-lg" id="inputPassword" value="{{$categoryById->id}}" name="categoryId">
            </div>
        </div>
        <div class="form-group row">

            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Category Description</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3" name="categoryDescription">{{$categoryById->categoryDescription}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Publication Status</label>
            <div class="col-sm-10">
                <select class="custom-select form-control form-control-lg " id="exampleFormControlSelect2" name="publicationStatus">
                    <option selected>--Select Publication Status--</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success form-control">Update Category</button>
            </div>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>
<script>
    document.forms['editCategoyForm'].elements['publicationStatus'].value = [{{$categoryById->publicationStatus}}];
</script>

@endsection
