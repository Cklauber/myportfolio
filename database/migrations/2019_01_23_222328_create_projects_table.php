<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->unsignedInteger('owner_id')->unsigned();
            $table->enum('status', ['completed', 'word in progress', 'cancel', 'drafted', 'created'])->default('initiated');
            $table->boolean('published')->default('false');
            $table->foreign('owner_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->json('stack')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
