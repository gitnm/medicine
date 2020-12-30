<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('substance_id')->nullable(false);
            $table->unsignedBigInteger('manufacturer_id')->nullable(false);
            $table->float('price');
            
            $table->foreign('substance_id')->references('id')->on('substances');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            
            $table->index(['substance_id', 'manufacturer_id']);
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropForeign('medicines_substance_id_foreign');
            $table->dropForeign('medicines_manufacturer_id_foreign');
            $table->dropIndex(['substance_id', 'manufacturer_id']);
        });
        
        Schema::dropIfExists('medicines');
    }
}
