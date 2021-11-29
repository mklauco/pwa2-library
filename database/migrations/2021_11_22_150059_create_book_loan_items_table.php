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

            $table->timestamp('returned_at')->nullable()->default(null);

            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')->references('id')->on('book_loans');

            $table->unsignedBigInteger('printout_id');
            $table->foreign('printout_id')->references('id')->on('book_printouts');

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
