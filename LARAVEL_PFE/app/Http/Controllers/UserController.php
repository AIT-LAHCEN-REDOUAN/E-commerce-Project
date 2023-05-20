<?php

namespace App\Http\Controllers;

use App\Models\compte;
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

    public function compte(Request $request)
    {
       // return response()->json($request);
       $validator=Validator::make($request->all(),[
        'fullname'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'code_postal'=>'required',
        'email'=>'required|email',
        'pays'=>'required',
        'region'=>'required',
       ]);

       if($validator->fails()){
        return response()->json([
            'validation_errors'=>$validator->messages()
        ]);
       }else{
        
                $compte=compte::where('user_email',$request->old_email)->first();
        if(isset($compte->id)){
                $user=User::where('email',$request->old_email)->first();
                $user->email=$request->email;
                $user->save();
                $compte->name=$request->fullname;
                $compte->telephone=$request->phone;
                $compte->adresse=$request->address;
                $compte->code_postal=$request->code_postal;
                $compte->pays=$request->pays;
                $compte->region=$request->region;
                $compte->user_email=$request->email;
                $compte->save();
        }else{
            $compte=compte::create([
                'name'=>$request->fullname,
                'telephone'=>$request->phone,
                'adresse'=>$request->address,
                'code_postal'=>$request->code_postal,
                'pays'=>$request->pays,
                'region'=>$request->region,
                'user_email'=>$request->email
            ]);
        }

        return response()->json([
            'status'=>200,
            'compte'=>$compte,
            'message'=>'Saved Profile Successfully'
        ]);
       }


    }
}
