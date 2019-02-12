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

            $table->string('title');

            $table->string('slug');

            $table->text('description');

            $table->enum('status', [
                'completed',
                'work in progress',
                'canceled',
                'initiated'])->default('initiated');

            $table->boolean('is_public')
            ->default(false)
            ->comment('Can guests view this project?');

            $table->json('stack')->nullable();

            $table->string('repository')->default('');

            $table->boolean('is_public_repository')->default(false);

            $table->unsignedInteger('owner_id')->unsigned();

            $table->foreign('owner_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

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
