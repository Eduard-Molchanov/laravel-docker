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
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->decimal("cost_per_year");
            $table->text("description");
            $table->unsignedBigInteger("agent_id");
            $table->foreign("agent_id")->references("id")->on("agents");
            $table->text("advantages");
            $table->string("photos");
            $table->decimal("cost_for_6_months");
            $table->decimal("cost_per_month");
            $table->decimal("amount_of_discount");
            $table->unsignedBigInteger("product_category_id");
            $table->foreign("product_category_id")->references("id")->on("product_categories");
            $table->string("status");
            $table->dateTime("offer_expiration_date");
            $table->text("options");
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
        Schema::dropIfExists('products');
    }
}
