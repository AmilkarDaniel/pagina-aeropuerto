<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function loginUser(Request $request)
    {
        //$input = $request->all();
        // Auth::attempt($input);

        if (Auth::attempt(['email' => $request->input('usuario'), 'password' => $request->input('contraseña')])) {
            $user = Auth::user();
            $token = $user->createToken('example')->accessToken;
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
            \DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);
            $accessToken->revoke();
            return Response(['data' => 'Unauthorized', 'message' => 'User logout successfully.'],200);
        } else{
        return Response(['data' => 'Unauthorized'],401);
        }
    }

    public function index()
    {
        if(Auth::guard('api')->check()){
            /* $user = Auth::guard('api')->user();
            return Response(['data' => $user],200); */
            $users = User::get();
            return response()->json($users);
            
        }else{
        return Response(['data' => 'Unauthorized'],401);
        }
    }
    
    public function store(Request $request)
    {
        if(Auth::guard('api')->check()){
            try{
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->cargo = $request->cargo;
                $user->rol_id = $request->rol_id;
                $user->area_id = $request->area_id;
                $user->ca_idUsuario = $request->ca_idUsuario;
                $user->ca_tipo = $request->ca_tipo;
                $user->ca_estado = $request->ca_estado;
                $user->save();
                return response()->json(['status'=>true,'message'=>'Usuario '.$user->name.' creado']);
            }catch(\Exception $exc){
                return response()->json(['status'=>false,'message'=>'Error']);
                //return $exc;
            }           
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    
    public function show($id)
    {
        if(Auth::guard('api')->check()){
            $user = User::find($id);
            return response()->json($user);        
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
    
    public function update(Request $request, $id)
    {
        if(Auth::guard('api')->check()){
            try{
                $user = User::findOrFail($id);
                $user->name = $request->name;
                $user->password = bcrypt($request->password);
                $user->cargo = $request->cargo;
                $user->foto = $request->foto;
                $user->rol_id = $request->rol_id;
                $user->area_id = $request->area_id;
                $user->ca_idUsuario = $request->ca_idUsuario;
                $user->ca_tipo = $request->ca_tipo;
                $user->ca_estado = $request->ca_estado;
                $user->save();
                return response()->json(['status'=>true,'message'=>'Usuario '.$user->name.' actualizado']);
            }catch(\Exception $exc){
                return response()->json(['status'=>false,'message'=>'Error']);
                //return $exc;
            }           
        }else{
            return Response(['data' => 'Unauthorized'],401);
        }
    }
}
