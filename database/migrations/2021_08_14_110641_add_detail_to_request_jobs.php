<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailToRequestJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_jobs', function (Blueprint $table) {
            $table->string('Date of Birth');
            $table->string('comments_user');
            $table->string('comments_admin');
            $table->string('start_date');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_jobs', function (Blueprint $table) {
            //
        });
    }
}
