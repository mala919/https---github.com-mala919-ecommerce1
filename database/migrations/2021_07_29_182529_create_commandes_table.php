<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatecommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::dropIfExists('commandes');
        Schema::create('commandes', function (Blueprint $table) {
            $table->foreign('Product_id')->references('id')->on('products')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->Autoincrements('Commande_id');
            $table->Pass_com_date->format('dd, mm, YYYY');
            $table->livrison_date->format('dd, mm, YYYY');
            $table->floate('quantite');
            $table->string('lieu');
            $table->string('nom_livreur');
            $table->floate('frait_livrison');
            $table->floate('montant');
            $table->floate('discounts');
            $table->integer('num_livreur');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
