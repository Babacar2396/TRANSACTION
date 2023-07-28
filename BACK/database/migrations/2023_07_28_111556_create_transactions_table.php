<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['depot', 'retrait', 'transfert']);
            $table->decimal('montant', 10, 2);
            $table->dateTime('dateTransaction');
            $table->string('statut');
            $table->unsignedBigInteger('compteSource_id');
            $table->unsignedBigInteger('compteDestination_id')->nullable();
            $table->string('code', 30)->nullable();
            $table->foreign('compteSource_id')->references('id')->on('comptes');
            $table->foreign('compteDestination_id')->references('id')->on('comptes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
