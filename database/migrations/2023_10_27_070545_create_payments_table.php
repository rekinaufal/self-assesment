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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("upgraded_category");
            $table->string("payment_method");
            $table->string("bank_name");
            $table->string("bank_account_number");
            $table->string("bank_account_name");
            $table->string("transaction_receipt");
            $table->enum("status", ["pending", "approved", "rejected"])->default("pending");
            // $table->unsignedBigInteger("approved_by")->nullable();
            $table->string("approved_by")->nullable();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("upgraded_category")->references("id")->on("user_categories")->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign("approved_by")->references("id")->on("users")->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
