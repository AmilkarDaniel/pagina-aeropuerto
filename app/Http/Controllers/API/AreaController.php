<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    //!----------muestra las areas----------
    public function index()
    {
        if(Auth::guard('api')->check()){
            try{
                $areas = Area::where('ca_estado', true)->pluck('nombre');
                return response()->json($areas);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!------------crear area-------------------
    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $area = new Area();
                $area->nombre = $request->input('nombre');
                $area->ca_idUsuario = $user->id;
                $area->ca_tipo = "create";
                $area->ca_estado = true;
                $area->save();
                return response()->json(['status'=>true,'message'=>'Area '.$area->nombre.' creada.']);
            }catch(\Exception $exc){
                return response()->json(['status'=>false,'message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
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
            $area->ca_idUsuario = $request->ca_idUsuario;
            $area->ca_tipo = $request->ca_tipo;
            $area->ca_estado = $request->ca_estado;
            $area->save();
            return response()->json(['status'=>true,'message'=>'Area '.$area->nombre.' actualizado']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false,'message'=>'Error']);
            //return $exc;
        }
    }
}
