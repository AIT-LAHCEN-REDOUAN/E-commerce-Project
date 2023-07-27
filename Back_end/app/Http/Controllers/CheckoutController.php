<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    //

    public function Checkout(Request $request){

        $validator=Validator::make($request->all(),[
            'firstName'=>'required|max:191',
            'lastName'=>'required|max:191',
            'phone'=>'required|max:191',
            'Address'=>'required|max:191',
            'City'=>'required|max:191',
            'Zip'=>'required|max:191'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
        }else{
            $commande=new commande();
            $commande->user_id=$request->user_id;
            $commande->firstname=$request->firstName;
            $commande->lastname=$request->lastName;
            $commande->phone=$request->phone;
            $commande->address=$request->Address;
            $commande->city=$request->City;
            $commande->zipcode=$request->Zip;
            $commande->payment_mode=$request->payment_mode;
            $commande->payment_id=$request->payment_id;
            $commande->save();

            $panier=panier::where('user_email',$request->user_email)->get();
            $command_details=[];
            foreach($panier as $item){
                $command_details[]=[
                    'produit_id'=>$item->produit_id,
                    'qte'=>$item->quantity,
                    'prix'=>$item->produit->prix
                ];

                $item->produit->quantity_stock=$item->produit->quantity_stock-$item->quantity;
                $item->produit->save();
               
            }

            $commande->commandeDetails()->createMany($command_details);
            panier::destroy($panier);
            return response()->json([
            'status'=>200,
            'message'=>'Orser Placed Successfully'
        ]);
        }
        
    }

    public function Checkout_validation(Request $request){
        $validator=Validator::make($request->all(),[
            'firstName'=>'required|max:191',
            'lastName'=>'required|max:191',
            'phone'=>'required|max:191',
            'Address'=>'required|max:191',
            'City'=>'required|max:191',
            'Zip'=>'required|max:191'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
        }else{
            return response()->json([
                'status'=>200,
                'message'=>'Form Validated Successfully'
            ]);
        }
    }
}
