<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permenperin_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('color', ["primary", "secondary", "light", "dark", "warning", "info", "danger"])->default("primary");
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
        Schema::dropIfExists('permenperin_categories');
    }
};
