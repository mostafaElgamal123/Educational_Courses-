<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyChooseUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('image');
            $table->string('icon_1')->default('fa fa-2x fa-graduation-cap');
            $table->string('icon_2')->default('fa fa-2x fa-graduation-cap');
            $table->string('icon_3')->default('fa fa-2x fa-graduation-cap');
            $table->string('Skilled_Instructors_title');
            $table->longText('Skilled_Instructors_description');
            $table->string('International_Certificate_title');
            $table->longText('International_Certificate_description');
            $table->string('Online_Classes_title');
            $table->longText('Online_Classes_description');
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
        Schema::dropIfExists('why_choose_us');
    }
}
