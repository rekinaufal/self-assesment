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
        Schema::create('calculation_results', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->longText("results");
            $table->unsignedBigInteger("computation_id")->nullable();
            $table->timestamps();

            $table->foreign("computation_id")->references("id")->on("computations")->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculation_results');
    }
};
