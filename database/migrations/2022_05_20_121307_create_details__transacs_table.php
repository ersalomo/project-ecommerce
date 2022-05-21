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
        Schema::create('details__transacs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_id', false, true);
            $table->bigInteger('product_id', false, true);
            $table->foreign('transaction_id')->references('id')
                ->on('transactions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('details__transacs');
    }
};
