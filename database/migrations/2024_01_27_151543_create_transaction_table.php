<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
	    $table->double('value');
	    $table->unsignedBigInteger('payer_id');
	    $table->unsignedBigInteger('payee_id');
	    $table->foreign('payer_id')->references('id')->on('wallets');
	    $table->foreign('payee_id')->references('id')->on('wallets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
