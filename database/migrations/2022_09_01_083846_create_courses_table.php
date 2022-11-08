<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->longText('image');
            $table->float('rating')->default('0');
            $table->integer('lectures')->default('0');
            $table->integer('duration')->default('0');
            $table->text('Skill_level')->default('all Level');
            $table->string('language')->default('Arabic');
            $table->integer('discount')->default('0');
            $table->string('status')->default('publish');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('instructor_id')->constrained('instructors');
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
        Schema::dropIfExists('courses');
    }
}
