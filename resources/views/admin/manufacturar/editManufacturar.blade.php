@extends('admin.master')
@section('title')
Edit Manufacturar
@endsection
@section('main_content')
<div class="jumbotron">
    
    <hr>

    {!!Form::open(['url'=>'/manufacturar/update','method'=>'POST','class'=>'form-horizontal','name'=>'editManufacturarForm'])!!}

    <fieldset>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Manufacturar Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="inputPassword" name="manufacturarName" value="{{$manufacturarById->manufacturarName}}">
                <input type="hidden" class="form-control form-control-lg" id="inputPassword" value="{{$manufacturarById->id}}" name="manufacturarId">
            </div>
        </div>
        <div class="form-group row">

            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Manufacturar Description</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3" name="manufacturarDescription">{{$manufacturarById->manufacturarDescription}}</textarea>
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
                <button type="submit" class="btn btn-success form-control">Update Manufacturar</button>
            </div>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>
<script>
    document.forms['editManufacturarForm'].elements['publicationStatus'].value = [{{$manufacturarById->publicationStatus}}];
</script>

@endsection
