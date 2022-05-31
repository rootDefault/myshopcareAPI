<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function login(Request $request){
        $user=User::where('email',$request->email)->first();
        
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' =>['These credentials do not match our records']
            ],404);
        }
        $token =$user->createToken('my-app-token')->plainTextToken;
        $response =[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
    function addUser(Request $request){
        if($request==null)
        return "Null request";
        else{
        $user = new User;
        $user->name=$request->name;
        $user->email= $request->email;
    $user->password= Hash::make($request->password);
    $user->role= $request->role;

    $result =$user->save();
    if($result)
        return "user saved";
        else
        return "failed";
        }
    }
    function getUsers(){
        return User::pluck('email');
        
    }
}
