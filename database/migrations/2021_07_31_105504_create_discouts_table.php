<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('discouts');
        Schema::create('discouts', function (Blueprint $table) {
            $table->foreign('Produit_id')->references('id')->on('admins')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->Autoincrements('id');
            $table->date_début->format('dd, mm, YYYY');
            $table->date_expiration->format('dd, mm, YYYY');
            $table->float('pourcentage');
            //no9sd esm discout chniya mithel discout t3 3id 7kaya kek//
            $table->string('title_dis');
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
        Schema::dropIfExists('discouts');
    }
}
