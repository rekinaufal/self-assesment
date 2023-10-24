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
        Schema::create('computations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_permenkerin_id");
            $table->string("production_result");
            $table->string("product_type");
            $table->string("specification");
            $table->string("brand");
            $table->timestamps();

            $table->foreign("category_permenkerin_id")->references("id")->on("category_permenperins")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computations');
    }
};
