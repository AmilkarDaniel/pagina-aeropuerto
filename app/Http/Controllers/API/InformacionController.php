<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use App\Models\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformacionController extends Controller
{
    public function index(){
        if(Auth::guard('api')->check()){
            try{
                
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    public function store($id){
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $informacion = new Informacion();
                $aeropuerto = Aeropuerto::where('aeropuerto_id', $id)->first();
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
}
