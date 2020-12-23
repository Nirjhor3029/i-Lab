<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idea_id');
            $table->unsignedBigInteger('user_id');

            $table->string("team_name")->nullable();
            $table->string("team_members")->nullable();

            $table->foreign('idea_id')->references('id')->on('ideas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('idea_teams');
    }
}
