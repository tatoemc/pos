<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouncerfatitemsTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('mouncerfatitems', function (Blueprint $table) {
            $table->id();               
            $table->unsignedBigInteger('mouncerfatcat_id');
            $table->string('name'); 
            $table->text('note');
            $table->double('amount', 8, 2); 
            
            $table->foreign('mouncerfatcat_id')->references('id')->on('mouncerfatcats')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('mouncerfatitems');
    }
}
