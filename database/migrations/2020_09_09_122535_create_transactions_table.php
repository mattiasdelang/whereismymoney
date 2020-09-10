<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float('bedrag');
            $table->boolean('eenmalig');
            $table->dateTime('datum');
            $table->text('omschrijving')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('family_id');
            $table->foreignId('store_id')->nullable();
            $table->foreignId('category_id')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
