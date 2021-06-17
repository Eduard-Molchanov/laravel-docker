<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("agent_id")->nullable();
            $table->foreign("agent_id")->references("id")->on("agents")->nullOnDelete();
            $table->unsignedBigInteger("company_id")->nullable();
            $table->foreign("company_id")->references("id")->on("insurance_companies")->nullOnDelete();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->nullOnDelete();
            $table->decimal("cost")->nullable();
            $table->unsignedBigInteger("product_id")->nullable();
            $table->foreign("product_id")->references("id")->on("products")->nullOnDelete();
            $table->decimal("maximum_payment_amount")->nullable();
            $table->dateTime("effective_date")->nullable();
            $table->dateTime("expiration_date")->nullable();
            $table->dateTime("payment_date")->nullable();
            $table->text("description_insurance_object")->nullable();
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
        Schema::dropIfExists('insurance_policies');
    }
}
