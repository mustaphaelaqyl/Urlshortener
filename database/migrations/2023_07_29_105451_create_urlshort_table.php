<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlshortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlshort', function (Blueprint $table) {
            $table->id();
            $table->longText("longUrl");
            $table->text("shortCode")->unique();
            $table->integer("counter")->default(0);
            $table->ipAddress('ipAddress');
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
        Schema::dropIfExists('urlshort');
    }
}
