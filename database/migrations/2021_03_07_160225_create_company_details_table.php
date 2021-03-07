<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->jsonb('image_title');
            $table->jsonb('about_title');
            $table->jsonb('about_description');
            $table->jsonb('help_title');
            $table->jsonb('help_description');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->text('google_map');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_details');
    }
}
