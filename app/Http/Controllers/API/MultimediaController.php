<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultimediaController extends Controller
{
    public function index()
    {
        $multimedias = Multimedia::get();
        return response()->json($multimedias);
    }

    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $multimedia = new Multimedia();
                $multimedia->archivo = $request->input('multimedia');
                $multimedia->ca_idUsuario = $user->id;
                $multimedia->ca_tipo = "create";
                $multimedia->ca_estado = true;
                $multimedia->save();
                return response()->json(['status'=>'OK','message'=>'Usuario '.$user->name.' creado']);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }           
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    public function show(string $id)
    {
        if(Auth::guard('api')->check()){
            try{
                $multimedia = Multimedia::where('ca_estado', true)->find($id);
                if(!$multimedia){
                    return response()->json(['status' => 'NOK','messagge' => 'Archivo Inexistente'],400);
                }
                return response()->json($multimedia);        
            }catch(\Exception $exc){
                return response()->json(['status'=>false,'message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        //
    }
}
