<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AeropuertoController extends Controller
{
    //inicio. listar aeropuertos
    public function index(){
        // if(Auth::guard('api')->check()){
            try{
                $aeropuertos = Aeropuerto::where('ca_estado', true)->pluck('nombre');
                return response()->json($aeropuertos, 200);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        // }else{
        //     return Response(['data' => 'Unauthorized'],401);
        // }
    }
    //fin. listar aeropuertos
    
    //inicio. registrar aeropuerto
    public function store(Request $request){
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $aeropuerto = new Aeropuerto();
                $aeropuerto->nombre = $request->input('nombre');
                $aeropuerto->ca_idUsuario = $user->id;
                $aeropuerto->ca_tipo = "create";
                $aeropuerto->ca_estado = true;
                $aeropuerto->save();
                return response()->json(['status' => 'OK', 'messagge' => 'Aeropuerto Registrado'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    //fin. resgistrar aeropuerto

    //inicio. modificar aeropuerto
    public function update(Request $request, $id){
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $aeropuerto = Aeropuerto::findOrFail($id);
                $aeropuerto->nombre = $request->input('nombre');
                $aeropuerto->ca_idUsuario = $user->id;
                $aeropuerto->ca_tipo = "update";
                $aeropuerto->ca_estado = true;
                $aeropuerto->save();
                return response()->json(['status' => 'OK', 'messagge' => 'Aeropuerto Modificado'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    //fin. modificar aeropuerto
    
    //inicio. dar de baja aeropuerto
    public function destroy($id){
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $aeropuerto = Aeropuerto::findOrFail($id);
                $aeropuerto->ca_idUsuario = $user->id;
                $aeropuerto->ca_tipo = "delete";
                $aeropuerto->ca_estado = false;
                $aeropuerto->save();
                return response()->json(['status' => 'OK', 'messagge' => 'A eropuerto Eliminado'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    //fin. dar de baja aeropuerto
}
