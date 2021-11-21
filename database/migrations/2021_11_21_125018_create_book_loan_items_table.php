<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLoanItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_loan_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_printout_id');
            $table->foreign('book_printout_id')->references('id')->on('book_printouts');

            $table->unsignedBigInteger('book_loan_id');
            $table->foreign('book_loan_id')->references('id')->on('book_loans');

            $table->timestamp('returned_at');

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
        Schema::dropIfExists('book_loan_items');
    }
}
