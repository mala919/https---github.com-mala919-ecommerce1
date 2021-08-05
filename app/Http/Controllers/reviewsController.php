<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reviewsController extends Controller
{
    public function index(){
        return reveiw::all();
    }
    public function show($reveiw_id)
    {
        return reveiw::find($reveiw_id);
    }
    public function delete(Request $request,$reveiw_id){
        $reveiw = reveiw::findOrFail($reveiw_id);
        $reveiw ->delete();
        return 204;
    }
    public function getreveiwBydate_poster($date_poster)
    {
        return DB::table('reveiws')
            ->where('date_poster','=',$date_poster)
            ->get();

    }
    public function getreveiwById_Produit($Produit_id)
    {
        return DB::table('reveiws')
            ->where('Produit_id','=',$Produit_id)
            ->get();

    }
    public function store(Request $request)
    {   $p=new reveiw();
        $p->Admin_id=$request['Admin_id'];
        $p->Product_id=$request['Product_id'];
        $p->avis=$request['avis'];
        $p->discriptione=$request['discription'];
        $p->date_poster=$request['date_poster'];
        $p->save();
        return $p->reveiw_id;
    }
    public function update(Request $request, $reveiw)
    {
        $p = reveiw::findOrFail($reveiw_id);            
        $p->Admin_id=$request['Admin_id'];
        $p->Product_id=$request['Product_id'];
        $p->avis=$request['avis'];
        $p->discriptione=$request['discription'];
        $p->date_poster=$request['date_poster'];
        $p->update();

        return $p->update();
    }
    

}
