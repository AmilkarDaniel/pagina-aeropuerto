<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::get();
        return response()->json($noticias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //recopiladno datos de usuario
        $user = Auth::guard('api')->user();

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->detalle = $request->detalle;
        $noticia->prioridad = $request->prioridad;
        $noticia->vigenciaI = $request->vigenciaI;
        $noticia->vigenciaF = $request->vigenciaF;
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
        $multimedia->archivo = $request->archivo;
        $multimedia->ca_idUsuario = $noticia->ca_idUsuario;
        $multimedia->ca_tipo = $noticia->ca_tipo;
        $multimedia->ca_estado = $noticia->ca_estado;
        $multimedia->save();
        return response()->json(['status' => true, 'messagge' => 'Noticia creada']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
