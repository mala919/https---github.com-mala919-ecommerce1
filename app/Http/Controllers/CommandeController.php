<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index(){
        return Commande::all();
    }
    public function show($Commande_id)
    {
        return Commande::find($Commande_id);
    }
    public function delete(Request $request,$Commande_id){
        $Commande = Commande::findOrFail($Commande_id);
        $Commande->delete();
        return 204;
    }
    public function getCommandeByTitle($title)
    {
        return DB::table('commandes')
            ->where('title','=',$title)
            ->get();

    }
    public function getCommandeById_Produit($Produit_id)
    {
        return DB::table('commandes')
            ->where('Produit_id','=',$Produit_id)
            ->get();

    }
    //fhmt ili a7na bch nsajlo l commande kif yb3atheha client mch ladmin yktbha //
    public function store(Request $request)
    {   $p=new Commande();
        $p->montant=$request['montant'];
        $p->Pass_com_date=$request['Pass_com_date'];
        $p->livrison_date=$request['livrison_date'];
        $p->quantite=$request['quantite'];
        $p->lieu=$request['lieu'];
        $p->nom_livreur=$request['nom_livreur'];
        $p->frait_livrison=$request['frait_livrison'];
        $p->num_livreur=$request['num_livreur'];
        $p->save();
        return $p->Commande_id;
    }
    public function update(Request $request, $Commande_id)
    {
        $p = Produit::findOrFail($Commande_id);            
        $p->montant=$request['montant'];
        $p->Pass_com_date=$request['Pass_com_date'];
        $p->livrison_date=$request['livrison_date'];
        $p->quantite=$request['quantite'];
        $p->lieu=$request['lieu'];
        $p->nom_livreur=$request['nom_livreur'];
        $p->frait_livrison=$request['frait_livrison'];
        $p->num_livreur=$request['num_livreur'];
        $p->price=$request['liste_de_permission'];
        $p->update();

        return $p->update();
    }
    public function getPass_com_date($Pass_com_date)
    {
    
        return Carbon::parse($Pass_com_date)->format('dd, mm, YY');
       
    }
    public function getlivrison_date($livrison_date)
    {
    
      
        return Carbon::parse($livrison_date)->format('dd, mm, YY');


    }

    

}

