<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnInRequestJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_jobs', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('social_status');
            $table->dropColumn('average');
            $table->dropColumn('certificate_photo');
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
            $table->dropColumn('email');
            $table->dropColumn('social_status');
            $table->dropColumn('average');
            $table->dropColumn('certificate_photo');
        });
    }
}
