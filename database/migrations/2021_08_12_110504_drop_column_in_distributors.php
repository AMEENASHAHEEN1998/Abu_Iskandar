<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnInDistributors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->dropColumn('distributor_name_ar');
            $table->dropColumn('distributor_name_en');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distributors', function (Blueprint $table) {
            $table->string('distributor_name_ar');
            $table->string('distributor_name_en');
        });
    }
}
