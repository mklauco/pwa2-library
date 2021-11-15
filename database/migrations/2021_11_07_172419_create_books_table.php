<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name')->default(null)->nullable();
            $table->text('description')->default(null)->nullable();
            $table->string('genre')->default(null)->nullable();
            $table->integer('author')->default(null)->nullable();
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
        // Schema::table('books', function (Blueprint $table) {
            //
            Schema::dropIfExists('books');
        // });
    }
}
