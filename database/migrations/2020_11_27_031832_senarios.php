<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Senarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senarios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('post');
            $table->string('post_excerpt');
            $table->string('slug')->unique();
            $table->string('user_id');
            $table->string('metaDescription');
            $table->string('featureImage');
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
        Schema::dropIfExists('senarios');
    }
}
