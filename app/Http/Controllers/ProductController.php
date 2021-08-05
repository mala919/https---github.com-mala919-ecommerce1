<?php

namespace App\Http\Controllers;

use App\produit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    public function index(){
        return produit::all();
    }
    public function show($Produit_id)
    {
        return Produit::find($Produit_id);
    }

    public function store(Request $request)
    {   $p=new Produit();
        $p->title=$request['title'];
        $p->categorie=$request['categorie'];
        $p->descriptionFR=$request['descriptionFR'];
        $p->descriptionEN=$request['descriptionEN'];
        $p->descriptionSU=$request['descriptionSU'];
        $p->price=$request['price'];
        $p->size=$request['size'];
        $p->save();
        return $p->Produit_id;
    }

    public function update(Request $request, $Produit_id)
    {
        $p = Produit::findOrFail($Produit_id);
       // $produit->title=$request['title'];
        //$produit->save();
        $p->title=$request['title'];
        $p->categorie=$request['categorie'];
        $p->descriptionFR=$request['descriptionFR'];
        $p->descriptionEN=$request['descriptionEN'];
        $p->descriptionSU=$request['descriptionSU'];
        $p->price=$request['price'];
        $p->size=$request['size'];
        $p->update();

        return $p->update();
    }



    public function delete(Request $request,$Produit_id){
        $produit = Produit::findOrFail($Produit_id);
        $produit->delete();
        return 204;
    }

    public function numberProduit(){
        return DB::table('produits')->where('Produit_id','>','0')->get()->count();
    }

    public function getProduitByCategorie($categorie)
    {
        return DB::table('produits')
            ->where('categorie','=',$categorie)
            ->get();

    }
    public function getNumberProduitByCategorie($categorie){
        return DB::table('produits')->where('categorie','=',$categorie)->count();
    }

    public function newProduct($nb){
        return DB::table('produits')->orderBy('created_at','desc')->take($nb)->get();
    }
    public function lastProduct(){
        return DB::table('produits')->orderBy('created_at','asc')->take(3)->get();
    }
    public function lastProduit(){
            $res= Produit::orderBy('created_at','desc')->get();
            return $res;
         // return DB::table('produits')->latest('created_at')->first();
    }
    public function allCategorie(){
        return DB::table('produits')->select('categorie')->groupBy('categorie')->get();
    }

    public function  productActiveDiscount(){
        $mytime = Carbon::now();
        $mytime->toDateString();
            return DB::table('discounts')
                ->join("produits","produits.id","discounts.id_produit")
                ->where('expiration_date','>', $mytime->toDateString())
                ->where('start_date','<',$mytime->toDateString())
                ->join("images","images.id_element","produits.id")->where("images.type","=","produit")

                ->get();
    }
    public function productUnderPricce($price){
        return DB::table('produits')
            ->select('title','Produit_id','categorie','price')
            ->where('price','<=',$price)
            ->get();
    }
    public function productSimlaire($categorie,$Produit_id){
        return DB::table('produits')
                ->where('categorie','=',$categorie)
                ->where('Produit_id','<>',$Produit_id)
                ->take(3)
                ->get();
    }


}
