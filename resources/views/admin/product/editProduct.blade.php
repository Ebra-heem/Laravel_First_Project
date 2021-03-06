@extends('admin.master')
@section('title')
Edit Category
@endsection
@section('main_content')
<div class="jumbotron">
    
    <hr>

    {!!Form::open(['url'=>'/product/update','method'=>'POST','class'=>'form-horizontal','name'=>'editCategoyForm','enctype'=>'multipart/form-data'])!!}
    <a href="editProduct.blade.php"></a>
    <fieldset>
          <div class="form-group row {{ $errors->has('productName') ? ' has-error' : '' }}">
            <label for="inputPassword" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" value="{{$productById->productName}}" class="form-control form-control-lg" id="inputPassword" name="productName">
                <input type="hidden" value="{{$productById->id}}" class="form-control form-control-lg" id="inputPassword" name="productId">
                @if($errors->has('productName'))
                <span class="help-block">
                    <strong>{{ $errors->first('productName') }}</strong>
                </span>
                @endif
            </div>
        </div>
     
        <div class="form-group row">
            <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <select class="custom-select form-control form-control-lg " id="exampleFormControlSelect2" name="categoryId">
                   <!-- <option>--Select Category Name--</option>-->
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Manufacturar Name</label>
            <div class="col-sm-10">
                <select class="custom-select form-control form-control-lg " id="exampleFormControlSelect2" name="manufacturarId">
                  <!--  <option>--Select Manufacturar Name--</option>-->
                    @foreach($manufacturars as $manufacturar)
                    <option value="{{$manufacturar->id}}">{{$manufacturar->manufacturarName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
           <div class="form-group row {{ $errors->has('productPrice') ? ' has-error' : '' }}">
            <label for="inputPassword" class="col-sm-2 col-form-label">Product Price</label>
            <div class="col-sm-10">
                <input type="number" value="{{$productById->productPrice}}" class="form-control form-control-lg" id="inputPassword" name="productPrice">
                @if($errors->has('productPrice'))
                <span class="help-block">
                    <strong>{{ $errors->first('productPrice') }}</strong>
                </span>
                @endif
            </div>
        </div>
           <div class="form-group row {{ $errors->has('productQuantity') ? ' has-error' : '' }}">
            <label for="inputPassword" class="col-sm-2 col-form-label">Product Quantity</label>
            <div class="col-sm-10">
                <input type="number" value="{{$productById->productQuantity}}" class="form-control form-control-lg" id="inputPassword" name="productQuantity">
                @if($errors->has('productQuantity'))
                <span class="help-block">
                    <strong>{{ $errors->first('productQuantity') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row {{ $errors->has('productShortDescription') ? ' has-error' : '' }}">

            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Product Short Description</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="6" name="productShortDescription">{{$productById->productShortDescription}}</textarea>
                @if($errors->has('productShortDescription'))
                <span class="help-block">
                    <strong>{{ $errors->first('productShortDescription') }}</strong>
                </span>
                @endif
            </div>

        </div>
         <div class="form-group row {{ $errors->has('productLongDescription') ? ' has-error' : '' }}">

            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Product Long Description</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="10" name="productLongDescription">{{$productById->productLongDescription}}</textarea>
                @if($errors->has('productLongDescription'))
                <span class="help-block">
                    <strong>{{ $errors->first('productLongDescription') }}</strong>
                </span>
                @endif
            </div>

        </div>
                <div class="form-group row {{ $errors->has('productImage') ? ' has-error' : '' }}">
            <label for="inputPassword" class="col-sm-2 col-form-label">Product Image</label>
            <div class="col-sm-10">
                
                <input type="file" id="inputPassword" name="productImage" accept="image/*">
                <img src="{{asset($productById->productImage)}}" alt="" width="150" height="150">
                @if($errors->has('productImage'))
                <span class="help-block">
                    <strong>{{ $errors->first('productImage') }}</strong>
                </span>
                @endif
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
                <button type="submit" class="btn btn-success form-control">Update Product</button>
            </div>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>
<script>
    document.forms['editCategoyForm'].elements['publicationStatus'].value = [{{$productById->publicationStatus}}];
</script>

@endsection
