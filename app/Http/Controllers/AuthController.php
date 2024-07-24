<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\CreatUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //給登入用插件

class AuthController extends Controller
{
    public function signup(CreatUser $request){
       $validatedData = $request->validated();

       $user = new user([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), //需要加密bcrypt
       ]);
       $user->save();
       return response('success',201);
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|string',
            'password' =>'required|string'
        ]);
        if(!Auth::attempt($validatedData)){
            return response('授權失敗',401);
        }
        $user = $request->user();
        $TokenReslut = $user->createToken('Token');
        $TokenReslut->token->save();
        return response(['token'=> $TokenReslut->accessToken]);
    }   
    public function user(Request $request){
        return response(
            $request->user()
        );
    }
    public function logout(Request $request){

        $request->user()->token()->revoke();
        return response(['message'=>'成功登出']);
    }

}
