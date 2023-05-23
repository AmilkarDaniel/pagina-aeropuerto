<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    
    public function index()
    {
        $areas = Area::get();
        return response()->json($areas);
    }

    public function store(Request $request)
    {
        try{
            $area = new Area();
            $area->nombre = $request->nombre;
            $area->save();
            return response()->json(['status'=>true,'message'=>'Area '.$area->nombre.' creada.']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false,'message'=>'Error']);
            //return $exc;
        }  
    }

    public function show(string $id)
    {
        try{
            $area = Area::find($id);
            return response()->json($area);        
        }catch(\Exception $exc){
            return response()->json(['status'=>false,'message'=>'Error']);
            //return $exc;
        }
    }

    public function update(Request $request, string $id)
    {
        try{
            $area = Area::findOrFail($id);
            $area->nombre = $request->nombre;
            $area->save();
            return response()->json(['status'=>true,'message'=>'Area '.$area->nombre.' actualizado']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false,'message'=>'Error']);
            //return $exc;
        }
    }
}
