<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlatformActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_actions', function (Blueprint $table) {
            $table->id();
            $table->integer("platform_id");
            $table->integer("action_id");
            $table->timestamps();
        });

        DB::table("platform_actions")->insert([
            [
                'platform_id'=>1,
                'action_id'=>1,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_actions');
    }
}
