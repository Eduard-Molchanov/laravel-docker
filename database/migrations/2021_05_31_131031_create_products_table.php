<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->decimal("cost_per_year")->nullable();
            $table->text("description")->nullable();
            $table->unsignedBigInteger("agent_id")->nullable();
            $table->foreign("agent_id")->references("id")->on("agents");
            $table->text("advantages")->nullable();
            $table->string("photos")->nullable();
            $table->decimal("cost_for_6_months")->nullable();
            $table->decimal("cost_per_month")->nullable();
            $table->decimal("amount_of_discount")->nullable();
            $table->unsignedBigInteger("product_category_id")->nullable();
            $table->foreign("product_category_id")->references("id")->on("product_categories")->nullOnDelete();
            $table->string("status")->nullable();
            $table->dateTime("offer_expiration_date")->nullable();
            $table->text("options")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists('products');
    }
}
