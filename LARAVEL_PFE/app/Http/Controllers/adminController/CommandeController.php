<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\commande;
use App\Models\Commande_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commande = DB::table("commandes")
        ->join("commande__details", "commandes.id", "=", "commande__details.commande_id")
        ->select(
            "commandes.id",
            "commandes.firstname",
            "commandes.lastname",
            "commandes.phone",
            "commandes.address",
            "commandes.city",
            "commandes.payment_id",
            "commandes.payment_mode",
            "commandes.date_commande",
            "commande__details.qte",
            "commande__details.prix",
            DB::raw("commande__details.qte * commande__details.prix as total_price")
        )
        ->get();
    
    return view("commande.show", ["commandes"=>$commande]);
    

    }
    public function destroy($id)
    {
       DB::beginTransaction();
        
        $commande = commande::find($id);
        $commande->delete();

        $commande_detail = Commande_Details::where("commande_id",$id);
        $commande_detail->delete();
        
        

       DB::commit();
       return redirect()->route("command.index")->with("delete_success",true);
    }
}