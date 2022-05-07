<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_custom');

            $table->unsignedBigInteger('bouquet');
            $table->foreign('bouquet')->references('id')->on('bouquets');
            $table->json('custom_data');
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('status')->default('queued');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
