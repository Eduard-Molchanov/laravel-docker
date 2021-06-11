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
            $table->unsignedBigInteger("agent_id");
            $table->foreign("agent_id")->references("id")->on("agents");
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("insurance_companies");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->decimal("cost");
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->decimal("maximum_payment_amount");
            $table->dateTime("effective_date");
            $table->dateTime("expiration_date");
            $table->dateTime("payment_date");
            $table->text("description_insurance_object");
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
