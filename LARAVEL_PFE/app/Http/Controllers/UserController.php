<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $this->validate($request, [
            'prenom' => 'required',
            'nom'=>'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $email=User::where('email',$request->email)->first();

        if(isset($email)){
            return response()->json(['error'=>'email déja exists']);
        }else{
             return  response()->json(User::create([
            'name'=>$request->prenom.' '.$request->nom,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]));
        }

       
    }


    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user=User::where('email',$request->email)->first();

        if(Hash::check($request->password,$user->password) and isset($user->id)){
                $token=$user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'message'=>true,
                    'token'=>$token,
                    'user'=>auth()->user()
                ]);
        }else{
            return response()->json([
                'message'=>false
            ]);
        }

   
    }

    public function logout(){
        Auth()->user()->tokens()->delete();
        return response()->json([
            'message'=>'deconnected'
        ]);
    }

    public function profile(){
        return response()->json(Auth()->user());
    }

  
}
