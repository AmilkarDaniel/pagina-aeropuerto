<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Multimedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//
use Illuminate\Support\Carbon;

class NoticiaController extends Controller
{
    
    //!-------------Muestra todas las noticias segun fecha reciente------------------
    public function index()
    {
        if(Auth::guard('api')->check()){
            try{
                /* $noticias = Noticia::all(); */
                $noticias = Noticia::orderBy('vigenciaI', 'desc')->where('ca_estado', true)->get();
                $noticiasCompletas = [];
                foreach ($noticias as $noticia){
                    $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                    $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                    $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
                    $noticiaMultimedia = array_merge($not, $mult);
                    $noticiasCompletas[] = $noticiaMultimedia;
                }
                return response()->json($noticiasCompletas, 200);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!--------------Muestra las noticias desctacadas--------------------
    public function noticiasDestacadas()
    {
        if(Auth::guard('api')->check()){
            try{
                //manda primero las de prioridad 1 ... usando 'desc' manda primero las de prioridad 3
                $noticias = Noticia::orderBy('prioridad')->where('ca_estado', true)->limit(5)->get();
                $noticiasCompletas = [];
                foreach ($noticias as $noticia) {
                    $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                    $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                    $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
                    $noticiaMultimedia = array_merge($not, $mult);
                    $noticiasCompletas[] = $noticiaMultimedia;
                }
                return response()->json($noticiasCompletas, 200);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!------------Crear Noticia-----------------
    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){            
            try{
                //recopiladno datos de usuario
                $user = Auth::guard('api')->user();
                $noticia = new Noticia();
                $noticia->titulo = $request->input('titulo');
                $noticia->detalle = $request->input('descripcion');
                $noticia->prioridad = $request->input('prioridad');
                $noticia->vigenciaI = Carbon::now();
                $noticia->vigenciaF = Carbon::now()->addDays(30);
                $noticia->user_id = $user->id;
                $noticia->ca_idUsuario = $user->id;
                $noticia->ca_tipo = "create";
                $noticia->ca_estado = true;
                $res = $noticia->save();
                if (!$res == 1) {
                    return 'error';
                }
                $multimedia = new Multimedia();
                $multimedia->id_noticia = $noticia->id;
                $multimedia->archivo = $request->input('imagen');
                $multimedia->ca_idUsuario = $user->id;
                $multimedia->ca_tipo = "create";
                $multimedia->ca_estado = true;
                $multimedia->save();

                //mostrar la noticia creada
                $noti = Noticia::where('ca_estado', true)->find($noticia->id);
                $multimedia = Multimedia::where('id_noticia',$noticia->id)->first();
                $mult = ['multimedia_id'=>$multimedia->id,'imagen'=>$multimedia->archivo];
                $not = ['id' => $noti->id, 'titulo'=>$noti->titulo,'descripcion'=>$noti->detalle,'fecha'=>$noti->vigenciaI];
                $noticiaMultimedia = array_merge($not,$mult);
                $noticiaCompleta = json_encode($noticiaMultimedia, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                $noticiaCompleta = json_decode($noticiaCompleta, false, 512, JSON_UNESCAPED_UNICODE);
                //fin mostrar la notici creada
                return response()->json(['status' => 'OK', 'messagge' => 'Noticia creada', 'noticia' => $noticiaCompleta], 201);            
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        } else {
            return Response(['status' => 'NOK','messagge' => 'Error'],401);
        }
    }

    //!--------------Muestra noticia atravez de ID---------------------
    public function show($id)
    {
        if(Auth::guard('api')->check()){
            try{
                $noticia = Noticia::where('ca_estado', true)->find($id);
                $multimedia = Multimedia::where('id_noticia',$id)->first();
                $mult = ['multimedia_id'=>$multimedia->id,'imagen'=>$multimedia->archivo];
                $not = ['id' => $noticia->id, 'titulo'=>$noticia->titulo,'descripcion'=>$noticia->detalle,'fecha'=>$noticia->vigenciaI];
                $noticiaMultimedia = array_merge($not,$mult);
                $noticiaCompleta = json_encode($noticiaMultimedia, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                $noticiaCompleta = json_decode($noticiaCompleta, false, 512, JSON_UNESCAPED_UNICODE);
                return response()->json($noticiaCompleta, 200);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }


    //!----------Muestra todas las noticias segun area que pertenece el usuario-------------
    public function noticiasArea()
    {
        if(Auth::guard('api')->check()){
            try{
                $user = Auth::guard('api')->user();
                $userArea = $user->area_id;
                $users = User::where('area_id',$userArea)->pluck('id');
                $noticias = Noticia::whereIn('user_id', $users)->where('ca_estado', true)->get();
                $noticiasCompletas = [];
                foreach ($noticias as $noticia) {
                    $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                    $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                    $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
                    $noticiaMultimedia = array_merge($not, $mult);
                    $noticiasCompletas[] = $noticiaMultimedia;
                }
                $respuesta = ['status' => 'OK','data'=>$noticiasCompletas];
                return response()->json($respuesta, 200);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!-------------------modifica la noticia------------------
    public function update(Request $request, $id)
    {
        if(Auth::guard('api')->check()){            
            try{
                //recopiladno datos de usuario
                $user = Auth::guard('api')->user();
                $noticia = Noticia::findOrFail($id);
                $noticia->titulo = $request->input('titulo');
                $noticia->detalle = $request->input('descripcion');
                $noticia->prioridad = $request->input('prioridad');
                $noticia->ca_idUsuario = $user->id;
                $noticia->ca_tipo = "update";
                $noticia->ca_estado = true;
                $res = $noticia->save();
                if (!$res == 1) {
                    return 'error';
                }
                $multimedia = Multimedia::where('id_noticia',$id)->first();
                $multimedia->archivo = $request->input('imagen');
                $multimedia->ca_idUsuario = $user->id;
                $multimedia->ca_tipo = "update";
                $multimedia->ca_estado = true;
                $multimedia->save();
                return response()->json(['status' => 'OK', 'messagge' => 'Noticia actualizada'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        } else {
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!-----------------Da de baja una noticia-----------------------
    public function destroy($id)
    {
        if(Auth::guard('api')->check()){            
            try{
            //recopiladno datos de usuario
                $user = Auth::guard('api')->user();
                $noticia = Noticia::findOrFail($id);
                $noticia->ca_idUsuario = $user->id;
                $noticia->ca_tipo = "delete";
                $noticia->ca_estado = false;

                $res = $noticia->save();
                if (!$res == 1) {
                    return 'error';
                }
                $multimedia = Multimedia::where('id_noticia',$id)->first();
                $multimedia->ca_idUsuario = $user->id;
                $multimedia->ca_tipo = "delete";
                $multimedia->ca_estado = false;
                $multimedia->save();
                return response()->json(['status' => 'OK', 'messagge' => 'Noticia eliminada'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        } else {
            return Response(['data' => 'Unauthorized'],401);
        }
    }
//!============== PROXIMAMENTE ================
    //-----------buscar noticia por nombre-----------
}
