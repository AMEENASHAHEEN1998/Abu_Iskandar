<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('city');
            $table->string('address');
            $table->string('telephone_number');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('tweeter_link')->nullable();
            $table->softDeletes();
            $table->string('user_id');
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
        Schema::dropIfExists('information');
    }
}
