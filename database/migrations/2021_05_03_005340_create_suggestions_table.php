<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_detail_id');
            $table->foreign('invoice_detail_id')->references('id')->on('invoice_details')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('provider_id');
            $table->foreign('provider_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->float('price');
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
        Schema::dropIfExists('suggestions');
    }
}
