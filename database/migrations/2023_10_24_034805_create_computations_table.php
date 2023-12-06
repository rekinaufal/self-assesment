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
            $table->unsignedBigInteger("permenperin_category_id");
            $table->string("production_result");
            $table->string("product_type");
            $table->string("specification");
            $table->string("brand");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->enum("status", ["On Editing", "Draft", "Pending", "Finished"])->default("Draft");
            $table->timestamps();

            $table->foreign("permenperin_category_id")->references("id")->on("permenperin_categories")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("user_id")->references("id")->on("users")->nullOnDelete()->cascadeOnUpdate();
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
