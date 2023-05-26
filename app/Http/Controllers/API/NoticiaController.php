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
    //!----------Muestra todas las noticias segun fecha reciente------------------
    public function index()
    {
        if(Auth::guard('api')->check()){
            /* $noticias = Noticia::all(); */
            $noticias = Noticia::orderBy('vigenciaI', 'desc')->get();
            $noticiasCompletas = [];
    
            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }
    
            return response()->json($noticiasCompletas, 200);
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!------Muestra las noticias desctacadas--------------------
    public function noticiasDestacadas()
    {
        if(Auth::guard('api')->check()){
            //manda primero las de prioridad 1 ... usando 'desc' manda primero las de prioridad 3
            $noticias = Noticia::orderBy('prioridad'/* , 'desc' */)->limit(5)->get();
            $noticiasCompletas = [];
    
            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }
    
            return response()->json($noticiasCompletas, 200);
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!--------Crear Noticia------------
    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){            
            //recopiladno datos de usuario
            $user = Auth::guard('api')->user();
    
            $noticia = new Noticia();
            $noticia->titulo = $request->titulo;
            $noticia->detalle = $request->input('descripcion');
            $noticia->prioridad = $request->prioridad;
            $noticia->vigenciaI = Carbon::now();
            $noticia->vigenciaF = Carbon::now()->addDays(30);
            // $noticia->multimedia_id = $request->multimedia_id;
            $noticia->user_id = $user->id;
            $noticia->ca_idUsuario = $user->ca_idUsuario;
            $noticia->ca_tipo = $user->ca_tipo;
            $noticia->ca_estado = $user->ca_estado;
            $res = $noticia->save();
            if (!$res == 1) {
                return 'error';
            }
            $multimedia = new Multimedia();
            $multimedia->id_noticia = $noticia->id;
            $multimedia->archivo = $request->input('imagen');
            $multimedia->ca_idUsuario = $noticia->ca_idUsuario;
            $multimedia->ca_tipo = $noticia->ca_tipo;
            $multimedia->ca_estado = $noticia->ca_estado;
            $multimedia->save();
            return response()->json(['status' => 'OK', 'messagge' => 'Noticia creada'], 201);            
        } else {
            return Response(['status' => 'NOK','messagge' => 'Error'],401);
        }
    }

    //!-----------Muestra noticia atravez de ID---------------------
    public function show($id)
    {
        if(Auth::guard('api')->check()){
            $noticia = Noticia::find($id);
            $multimedia = Multimedia::where('id_noticia',$id)->first();
            $mult = ['multimedia_id'=>$multimedia->id,'imagen'=>$multimedia->archivo];
            $not = ['titulo'=>$noticia->titulo,'descripcion'=>$noticia->detalle,'fecha'=>$noticia->vigenciaI];
            $noticiaMultimedia = array_merge($not,$mult);
            
            $noticiaCompleta = json_encode($noticiaMultimedia, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            $noticiaCompleta = json_decode($noticiaCompleta, false, 512, JSON_UNESCAPED_UNICODE);
            return response()->json($noticiaCompleta, 200);
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }


    //!----------Muestra todas las noticias segun area que pertenece el usuario-------------
    public function noticiasArea()
    {
        if(Auth::guard('api')->check()){
            
            $user = Auth::guard('api')->user();
            $userArea = $user->area_id;
            $users = User::where('area_id',$userArea)->pluck('id');
            
            $noticias = Noticia::whereIn('user_id', $users)->get();
            /* return $noticias; */
            $noticiasCompletas = [];

            foreach ($noticias as $noticia) {
                $multimedia = Multimedia::where('id_noticia', $noticia->id)->first();
                $mult = ['multimedia_id' => $multimedia->id, 'imagen' => $multimedia->archivo];
                $not = ['titulo' => $noticia->titulo, 'descripcion' => $noticia->detalle, 'fecha' => $noticia->vigenciaI];
                $noticiaMultimedia = array_merge($not, $mult);
                $noticiasCompletas[] = $noticiaMultimedia;
            }

            return response()->json($noticiasCompletas, 200);

        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
