<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('personal_number')->default(null)->nullable();
            $table->string('street')->default(null)->nullable();
            $table->string('street_number')->default(null)->nullable();
            $table->string('city')->default(null)->nullable();
            $table->string('postcode')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('personal_number');
            $table->dropColumn('street');
            $table->dropColumn('street_number');
            $table->dropColumn('city');
            $table->dropColumn('postcode');
        });
    }
}
