<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prenom' => 'required|max:191',
            'nom' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|min:8'
        ]);
        // $email=User::where('email',$request->email)->first();

        if ($validator->fails()) {
            return response()->json([
            //'status'=>404,
            'validation_errors' => $validator->messages()]);
        } else {

            $user = User::create([
                'name' => $request->prenom . ' ' . $request->nom,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'status' => 200,
                'user' => $user,
                'token' => $token,
                'message' => 'Registered Successfully'

            ]);
        }
    }


    public function login(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'email' => 'required|max:191',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'validation_errors'=>$validator->messages()
            ]);
        }else{
            $user=User::where('email',$request->email)->first();
            if(! $user || !Hash::check($request->password,$user->password)){
                return response()->json([
                    'status'=>401,
                    'message'=>'Invalid Credentials'
                ]);
            }else{
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'status'=>200,
                    'user'=>$user,
                    'token'=>$token,
                    'message'=>'Logged In Successfully'
                ]);
            }
        }
    }

    public function logout()
    {
        Auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message'=>'Logged Out Successfully'
        ]);
    }

    public function profile()
    {
        return response()->json(Auth()->user());
    }
}
