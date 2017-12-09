<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturar;

class ManufacturarController extends Controller
{
    public function createCategory(){
        return view('admin.manufacturar.createManufacturar');
    }
    
    public function storeCategory(Request $request){
        
        $this->validate($request, [
            'manufacturarName' => 'required',
            'manufacturarDescription' => 'required',
            'publicationStatus' =>'required',
        ]);
        
        $manufacturar = new Manufacturar();
        $manufacturar->manufacturarName = $request->manufacturarName;
        $manufacturar->manufacturarDescription = $request->manufacturarDescription;
        $manufacturar->publicationStatus = $request->publicationStatus;
        $manufacturar->save();
        return redirect('/manufacturar/add')->with('message','Manufacturar info Save Successfully');
    }
    
    public function manageCategory(){
        $manufacturar = Manufacturar::all();
        return view('admin.manufacturar.manageManufacturar',['manufacturars'=>$manufacturar]);
    }
    
    public function editCategory($id){
        $manufacturarById = Manufacturar::where('id',$id)->first();
        return view('admin.manufacturar.editManufacturar',['manufacturarById'=>$manufacturarById]);
    }
    
        public function updateCategory(Request $request){
   
        $manufacturar = Manufacturar::find($request->manufacturarId);
        
        $manufacturar->manufacturarName = $request->manufacturarName;
        $manufacturar->manufacturarDescription = $request->manufacturarDescription;
        $manufacturar->publicationStatus = $request->publicationStatus;
        $manufacturar->save();
        return redirect('/manufacturar/manage')->with('message','Manufacturar info Updated Successfully');
    }
    
    public function deleteCategory($id){
        $manufacturar = Manufacturar::find($id);
        $manufacturar->delete();
        return redirect('/manufacturar/manage')->with('message','Manufacturar info Deleted Successfully');
    }
    
}
