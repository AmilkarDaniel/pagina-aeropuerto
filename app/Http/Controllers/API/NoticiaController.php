<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Noticia;
use App\Models\Multimedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//
use Illuminate\Support\Carbon;

class NoticiaController extends Controller
{
    
    //inicio. ver post's
    // public function index()
    // {
    //     if(Auth::guard('api')->check()){
    //         try{
    //             /* $noticias = Noticia::all(); */
    //             $noticias = Noticia::orderBy('vigenciaI', 'desc')->where('ca_estado', true)->get();
    //             $noticiasCompletas = [];
    //             foreach ($noticias as $noticia){
    //                 $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
    //                 $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
    //                 $not = ['id' => $noticia->id, 'prioridad' => $noticia->prioridad, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
    //                 //$not = ['id' => $noticia->id, 'tipo' => $noticia->tipo, 'prioridad' => $noticia->prioridad, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
    //                 $noticiaMultimedia = array_merge($not, $mult);
    //                 $noticiasCompletas[] = $noticiaMultimedia;
    //             }
    //             return response()->json($noticiasCompletas, 200);
    //         }catch(\Exception $exc){
    //             return response()->json(['status'=>'NOK','message'=>'Error']);
    //             //return $exc;
    //         }
    //     }else{
    //         return Response(['data' => 'Unauthorized'],401);
    //     }
    // }
    //fin. ver post's
    
    //inicio. ver post del area de comunicación 
    public function aComunicacion()
    {
        try{
            $nombreArea = 'Comunicación';
            $area = Area::where('nombre',$nombreArea)->pluck('id');
            $users = User::where('area_id',$area)->pluck('id');
            $noticias = Noticia::whereIn('user_id', $users)->where('ca_estado', true)->get();
            $noticiasCompletas = [];
            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI, 'prioridad' => $noticia->prioridad];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }
            $respuesta = ['status' => 'OK','data'=>$noticiasCompletas];
            return response()->json($respuesta, 200);
        }catch(\Exception $exc){
            return response()->json(['status'=>'NOK','message'=>'Error']);
            //return $exc;
        }
    }
    //fin. ver post del area de comunicación
    
    //inicio. ver post del area de legal 
    public function aLegal()
    {
        try{
            $nombreArea = 'Legal';
            $area = Area::where('nombre',$nombreArea)->pluck('id');
            $users = User::where('area_id',$area)->pluck('id');
            $noticias = Noticia::whereIn('user_id', $users)->where('ca_estado', true)->get();
            $noticiasCompletas = [];
            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI, 'prioridad' => $noticia->prioridad];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }
            $respuesta = ['status' => 'OK','data'=>$noticiasCompletas];
            return response()->json($respuesta, 200);
        }catch(\Exception $exc){
            return response()->json(['status'=>'NOK','message'=>'Error']);
            //return $exc;
        }
    }
    //fin. ver post del area de legal

    //inicio. ver post del area de Recursos 
    public function aRecursos()
    {
        try{
            $nombreArea = 'Recursos';
            $area = Area::where('nombre',$nombreArea)->pluck('id');
            $users = User::where('area_id',$area)->pluck('id');
            $noticias = Noticia::whereIn('user_id', $users)->where('ca_estado', true)->get();
            $noticiasCompletas = [];
            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'detalle' => $noticia->detalle, 'prioridad' => $noticia->prioridad];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }
            $respuesta = ['status' => 'OK','data'=>$noticiasCompletas];
            return response()->json($respuesta, 200);
        }catch(\Exception $exc){
            return response()->json(['status'=>'NOK','message'=>'Error']);
            //return $exc;
        }
    }
    //fin. ver post del area de Recursos
    
    //inicio. ver post del area de Transparencia 
    public function aTranparencia()
    {
        try{
            $nombreArea = 'Transparencia';
            $area = Area::where('nombre',$nombreArea)->pluck('id');
            $users = User::where('area_id',$area)->pluck('id');
            $noticias = Noticia::whereIn('user_id', $users)->where('ca_estado', true)->get();
            $noticiasCompletas = [];
            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }
            $respuesta = ['status' => 'OK','data'=>$noticiasCompletas];
            return response()->json($respuesta, 200);
        }catch(\Exception $exc){
            return response()->json(['status'=>'NOK','message'=>'Error']);
            //return $exc;
        }
    }
    //fin. ver post del area de Transparencia

    //inicio. ver post del area de Aeronautica 
    public function aAeronautica()
    {
        try{
            $nombreArea = 'Aeronautica';
            $area = Area::where('nombre',$nombreArea)->pluck('id');
            $users = User::where('area_id',$area)->pluck('id');
            $noticias = Noticia::whereIn('user_id', $users)->where('ca_estado', true)->get();
            $noticiasCompletas = [];
            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI, 'prioridad' => $noticia->prioridad];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }
            $respuesta = ['status' => 'OK','data'=>$noticiasCompletas];
            return response()->json($respuesta, 200);
        }catch(\Exception $exc){
            return response()->json(['status'=>'NOK','message'=>'Error']);
            //return $exc;
        }
    }
    //fin. ver post del area de Aeronautica
    
    //inicio. mostrar post destacadas
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
    //fin. mostrar post destacadas
    
    //inicia. crear post
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
    //fin. crear post
    
    //inicia. buscar post por id
    public function show($id)
    {
        if(Auth::guard('api')->check()){
            try{
                $noticia = Noticia::where('ca_estado', true)->find($id);
                $multimedia = Multimedia::where('id_noticia',$id)->first();
                $mult = ['multimedia_id'=>$multimedia->id,'imagen'=>$multimedia->archivo];
                $not = ['id' => $noticia->id, 'titulo'=>$noticia->titulo,'descripcion'=>$noticia->detalle,'fecha'=>$noticia->vigenciaI, 'prioridad'=>$noticia->prioridad];
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
    //fin. buscar post por id
    
    
    //inicio. mostrar post de area
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
                    $not = ['id' => $noticia->id, 'titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI, 'prioridad' => $noticia->prioridad];
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
    //fin. mostrar post de area
    
    //inicio. modificar post
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

                //inicio.prueba para enviar data de post modificado
                try{
                    $noticiaM = Noticia::where('ca_estado', true)->find($noticia->id);
                    $multimediaM = Multimedia::where('id_noticia',$id)->first();
                    $mult = ['multimedia_id'=>$multimediaM->id,'imagen'=>$multimediaM->archivo];
                    $not = ['id' => $noticiaM->id, 'titulo'=>$noticiaM->titulo,'descripcion'=>$noticiaM->detalle,'fecha'=>$noticiaM->vigenciaI, 'prioridad'=>$noticiaM->prioridad];
                    $noticiaMultimedia = array_merge($not,$mult);
                    $noticiaCompleta = json_encode($noticiaMultimedia, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                    $noticiaCompleta = json_decode($noticiaCompleta, false, 512, JSON_UNESCAPED_UNICODE);
                    return response()->json($noticiaCompleta, 200);
                }catch(\Exception $exc){
                    return response()->json(['status'=>'NOK','message'=>'Error']);
                }
                //fin.prueba para enviar data de post modificado

                return response()->json(['status' => 'OK', 'messagge' => 'Noticia actualizada'], 201);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }
        } else {
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    //fin. modificar post
    
    //inicio. eliminar post
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
    //fin. eliminar post
    
    
    //!============== PROXIMAMENTE ================
    //-----------buscar noticia por nombre-----------
    
}
