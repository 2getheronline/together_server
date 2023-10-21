<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->date('publishDate')->nullable();
            $table->date('deadlineDate')->nullable();
            $table->boolean('happy')->nullable();
            $table->string('image')->nullable();
            $table->string('screenshot')->nullable();
            $table->integer('level')->nullable();
            $table->integer('points')->default(0);
            $table->text('proposedComments')->nullable();
            $table->integer('limit')->default(0);
            $table->integer('status')->default(1);
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('version')->nullable();
            $table->integer('platformId')->refrences('id')->on('platforms')->nullable();
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
        Schema::dropIfExists('missions');
    }
}
