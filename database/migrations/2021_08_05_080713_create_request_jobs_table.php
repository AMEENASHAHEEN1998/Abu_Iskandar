<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('social_status');
            $table->string('specialization');
            $table->string('university');
            $table->string('average');
            $table->string('phone_number');
            $table->string('address');
            $table->string('status');
            $table->integer('status_value');
            $table->string('personal_image');
            $table->string('certificate_photo');
            $table->foreignId('job_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('request_jobs');
    }
}
