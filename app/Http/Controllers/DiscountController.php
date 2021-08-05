<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        return Discount::all();
    }
    public function show($Discount_id)
    {
        return Discount::find($Discount_id);
    }
    public function delete(Request $request,$Discount_id){
        $Discount = Discount::findOrFail($Discount_id);
        $Discount ->delete();
        return 204;
    }
    public function getDiscountByTitle($title_dis)
    {
        return DB::table('discounts')
            ->where('title_dis','=',$title_dis)
            ->get();

    }
    public function getdiscountById_Produit($Produit_id)
    {
        return DB::table('discounts')
            ->where('Produit_id','=',$Produit_id)
            ->get();

    }
    //fhmt ili a7na bch nsajlo l commande kif yb3atheha client mch ladmin yktbha //
    public function store(Request $request)
    {   $p=new Discount();
        $p->title_dis=$request['title_dis'];
        $p->date_début=$request['date_début'];
        $p->date_expiration=$request['date_expiration'];
        $p->pourcentage=$request['pourcentage'];
        $p->save();
        return $p->Discount_id;
    }
    public function update(Request $request, $Discount_id)
    {
        $p = Produit::findOrFail($Discount_id);            
        $p->title_dis=$request['title_dis'];
        $p->date_début=$request['date_début'];
        $p->date_expiration=$request['date_expiration'];
        $p->pourcentage=$request['pourcentage'];
        $p->update();

        return $p->update();
    }
    public function getdate_expiration($date_expiration)
    {
    
        return Carbon::parse($date_expiration)->format('dd, mm, YY');
       
    }
    public function getdate_début($date_début)
    {
      
        return Carbon::parse($date_début)->format('dd, mm, YY');


    }

    

}

