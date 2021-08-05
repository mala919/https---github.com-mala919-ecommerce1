<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::dropIfExists('reviews');
        Schema::create('reviews', function (Blueprint $table) 
        {     $table->foreign('Admin_id')->references('id')->on('admins')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->foreign('Product_id')->references('id')->on('products')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->Autoincrements('reveiw_id');
            $table->string('avis');
            $table->string('discription');
            $table->date_poster->format('dd, mm, YYYY');
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
        Schema::dropIfExists('reviews');
    }
}
