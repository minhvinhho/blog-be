<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\ApiLoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    public function register(ApiRegisterRequest $request){
        //if("password" === "password_match"){
            $user = new User;
            $user->fill($request->all());
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json($user);
       // }
       // return response()->json(['password_match' => 'password khong khop'], 401);
    }

    public function login(ApiLoginRequest $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::whereEmail($request->email)->first();
            $user->token = $user->createToken('App')->accessToken;
            return response()->json($user);
        }

        return response()->json(['email' => 'sai email hoac password'], 403 );
    }    

    public function userInfo(Request $request){
        return response()->json($request->user('api'));
    }
    
    /////////////////////////////////

    // public function updateUser(ApiUserRequest $request, $id) {
    //     $user = User::find($id);
    //     if(is_null($user)) {
    //         return response()->json(['message' => 'User Not Found'], 404);
    //     }
    //     $user->update($request->all());
    //     return response($user, 200);
    // }

    // public function deleteUser(Request $request, $id) {
    //     $user = User::find($id);
    //     if(is_null($user)) {
    //         return response()->json(['message' => 'User Not Found'], 404);
    //     }
    //     $user->delete();
    //     return response()->json(null, 204);
    // }
}
