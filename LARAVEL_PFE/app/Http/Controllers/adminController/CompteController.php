<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\compte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compte = DB::table("comptes")
        ->join("users", "comptes.user_email", "=", "users.email")
        ->select(
            "comptes.id",
            "comptes.name",
            "comptes.telephone",
            "comptes.adresse",
            "comptes.pays",
            "comptes.region",
            "comptes.user_email",
            "users.password",
        )
        ->get();
        return view("compte.show",["compte"=>$compte]);
    }  
    public function destroy(string $email)
    {
        DB::beginTransaction();
        
        $compte = compte::where("user_email",$email);
        $compte->delete();

        $user =User::where("email",$email);
        $user->delete();
        
        

       DB::commit();
       return redirect()->route("command.index")->with("delete_success",true);
    }
    }

