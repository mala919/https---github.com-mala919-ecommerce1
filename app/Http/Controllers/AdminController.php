<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return Admin::all();
    }
    public function show($Adimn_id)
    {
        return Admin::find($Adimn_id);
    }
    public function getAdminByNom($nom)
    {
        return DB::table('admins')
            ->where('nom','=',$nom)
            ->get();

    }
    
    public function delete(Request $request,$Adimn_id){
        $Adimn = Admin::findOrFail($Adimn_id);
        $Adimn->delete();
        return 204;
    }
    public function update(Request $request, $Adimn_id)
    {
        $p=new Admin();
        $p->email=$request['email'];
        $p->nom=$request['nom'];
        $p->num_tlf=$request['num_tlf'];
        $p->adresse=$request['adresse'];
        $p->liste_de_permission=$request['Ajouter_produit'];
        $p->liste_de_permission=$request['supprimer_produit'];
        $p->liste_de_permission=$request['modifier_produit'];
        $p->update();

        return $p->update();
    }
    public function store(Request $request)
    {   $p=new Admin();
        $p->email=$request['email'];
        $p->nom=$request['nom'];
        $p->num_tlf=$request['num_tlf'];
        $p->adresse=$request['adresse'];
        $p->liste_de_permission=$request['Ajouter_produit'];
        $p->liste_de_permission=$request['supprimer_produit'];
        $p->liste_de_permission=$request['modifier_produit'];
        $p->save();
        return $p->Admin_id;
    }
    public function getdiscountById_Produit($Produit_id)
    {
        return DB::table('discounts')
            ->where('Produit_id','=',$Produit_id)
            ->get();

    }
    public function getreviewById_Produit($Produit_id)
    {
        return DB::table('reveiws')
            ->where('Produit_id','=',$Produit_id)
            ->get();

    }
    public function getreviewById($reveiw_id)
    {
        return DB::table('reveiws')
            ->where('reveiw_id','=',$reveiw_id)
            ->get();

    }
    public function getdiscountById($Discount_id)
    {
        return DB::table('discounts')
            ->where('Discount_id','=',$Discount_id)
            ->get();

    }

}