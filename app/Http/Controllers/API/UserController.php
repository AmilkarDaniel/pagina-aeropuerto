<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Rol;
use App\Models\Area;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function loginUser(Request $request)
    {
        //$input = $request->all();
        // Auth::attempt($input);
        if (Auth::attempt(['email' => $request->input('usuario'), 'password' => $request->input('contraseña')])) {
            $user = Auth::user();
            $token = $user->createToken($user->name)->accessToken;
            return Response(['status' => 'OK','token' => $token],200);
        } else {
            return Response(['status' => 'NOK','token' => 'Datos Incorrectos'],401);
        }
        
    }

    public function getUserDetail(): Response
    {
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            return Response(['data' => $user],200);    
        }
        return Response(['data' => 'Unauthorized'],401);
    }
    
    public function userLogout()
    {
        if(Auth::guard('api')->check()){
            $accessToken = Auth::guard('api')->user()->token();
            DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);
            $accessToken->revoke();
            return Response(['data' => 'Unauthorized', 'message' => 'User logout successfully.'],200);
        } else{
        return Response(['data' => 'Unauthorized'],401);
        }
    }


    //!-----------muestra a todos los usuarios con su area y su rol----------
    public function index()
    {
        if(Auth::guard('api')->check()){
            $users = User::where('ca_estado', true)->get();
            $usersAll = []; 
            foreach($users as $user){
                $rol = Rol::where('id',$user->rol_id)->first();
                $area = Area::where('id',$user->area_id)->first();
                $nomRol = ['rol' => $rol->tipo];
                $nomArea = ['area' => $area->nombre];
                $dateUser = ['id' => $user->id, 'nombre' => $user->name, 'email' => $user->email, 'cargo' => $user->cargo, 'foto' => $user->foto];
                $userRolArea = array_merge($dateUser, $nomRol, $nomArea);
                $usersAll[] = $userRolArea;
            }
            return response()->json($usersAll);        
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    
    //!----------Crear usuario----------------
    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){
            try{
                $nombreArea = $request->input('area');
                $area = Area::where('nombre', $nombreArea)->first();
                if(!$area){
                    return response()->json(['status'=>'NOK','messagge'=>'No se encontro el area'],400);
                }
                $tipoRol = $request->input('rol');
                $rol = Rol::where('tipo', $tipoRol)->first();
                if(!$rol){
                    return response()->json(['status'=>'NOK','messagge'=>'No se encontro el tipo de rol'],400);
                }
                $usuario = Auth::guard('api')->user();
                $user = new User();
                $user->name = $request->input('nombre');
                $user->email = $request->input('email');
                $user->email_verified_at = Carbon::now();
                $user->password = bcrypt($request->input('password'));
                $user->cargo = $request->input('cargo');
                $user->foto = $request->input('foto');
                $user->rol_id = $rol->id;
                $user->area_id = $area->id;
                $user->ca_idUsuario = $usuario->id;
                $user->ca_tipo = "create";
                $user->ca_estado = true;
                $user->remember_token = Str::random(rand(20, 25));
                $user->save();
                return response()->json(['status'=>'OK','message'=>'Usuario '.$user->name.' creado']);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }           
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    
    //!--------busca ususario atravez de su ID-----------
    public function show($id)
    {
        if(Auth::guard('api')->check()){
            $user = User::where('ca_estado', true)->find($id);
            if(!$user){
                return response()->json(['status' => 'NOK','messagge' => 'Usuario Inexistente'],400);
            }
            $rol = Rol::where('id',$user->rol_id)->first();
            $area = Area::where('id',$user->area_id)->first();
            $dateUser = ['id' => $user->id, 'nombre' => $user->name, 'email' => $user->email, 'cargo' => $user->cargo, 'foto' => $user->foto];
            $nomRol = ['rol' => $rol->tipo];
            $nomArea = ['area' => $area->nombre];
            $userRolArea = array_merge($dateUser, $nomRol, $nomArea);
            return response()->json($userRolArea, 200);  
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    
    //!------modifica usuario---------------
    public function update(Request $request, $id)
    {
        if(Auth::guard('api')->check()){
            try{
                $nombreArea = $request->input('area');
                $area = Area::where('nombre', $nombreArea)->first();
                if(!$area){
                    return response()->json(['status'=>'NOK','messagge'=>'No se encontro el area'],400);
                }
                $tipoRol = $request->input('rol');
                $rol = Rol::where('tipo', $tipoRol)->first();
                if(!$rol){
                    return response()->json(['status'=>'NOK','messagge'=>'No se encontro el tipo de rol'],400);
                }
                $usuario = Auth::guard('api')->user();
                $user = User::findOrFail($id);;
                $user->name = $request->input('nombre');
                $user->email = $request->input('email');
                $user->email_verified_at = Carbon::now();
                $user->password = bcrypt($request->input('password'));
                $user->cargo = $request->input('cargo');
                $user->foto = $request->input('foto');
                $user->rol_id = $rol->id;
                $user->area_id = $area->id;
                $user->ca_idUsuario = $usuario->id;
                $user->ca_tipo = "update";
                $user->ca_estado = true;
                $user->save();
                return response()->json(['status'=>'OK','message'=>'Usuario actualizado']);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }           
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }

    //!---------dar de baaj usuario-----------
    public function destroy($id)
    {
        if(Auth::guard('api')->check()){
            try{
                $usuario = Auth::guard('api')->user();
                $user = User::findOrFail($id);;
                $user->ca_idUsuario = $usuario->id;
                $user->ca_tipo = "delete";
                $user->ca_estado = false;
                $user->save();
                return response()->json(['status'=>'OK','message'=>'Usuario eliminado']);
            }catch(\Exception $exc){
                return response()->json(['status'=>'NOK','message'=>'Error']);
                //return $exc;
            }           
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
}
