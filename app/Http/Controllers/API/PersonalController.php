<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    //inicio. listar personal
    public function index(){
        try{
            $personal = Personal::where('ca_estado', true)->get();
            return response()->json($personal, 200);
        }catch(\Exception $exc){
            return response()->json(['status'=>'NOK','message'=>'Error']);
            //return $exc;
        }
    }
    //fin. listar personal

    //inicio. registrar personal
    public function store(Request $request){
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $personal = new Personal();
                $personal->nombre = $request->input('nombre');
                $personal->cargo = $request->input('cargo');
                $personal->direccion = $request->input('direccion');
                $personal->foto = $request->input('foto');
                $personal->ca_idUsuario = $user->id;
                $personal->ca_tipo = "create";
                $personal->ca_estado = true;
                $personal->save();
                return response()->json(['status' => 'OK', 'messagge' => 'Personal Registrado'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    //fin. resgistrar personal

    //inicio. modificar personal
    public function update(Request $request, $id){
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $personal = Personal::findOrFail($id);
                $personal->nombre = $request->input('nombre');
                $personal->cargo = $request->input('cargo');
                $personal->direccion = $request->input('direccion');
                $personal->foto = $request->input('foto');
                $personal->ca_idUsuario = $user->id;
                $personal->ca_tipo = "update";
                $personal->ca_estado = true;
                $personal->save();
                return response()->json(['status' => 'OK', 'messagge' => 'Personal Modificado'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    //fin. modificar personal

    //inicio. eliminar personal
    public function delete($id){
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $personal = Personal::findOrFail($id);
                $personal->ca_idUsuario = $user->id;
                $personal->ca_tipo = "delete";
                $personal->ca_estado = false;
                $personal->save();
                return response()->json(['status' => 'OK', 'messagge' => 'Personal Modificado'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    //fin. eliminar personal
}
