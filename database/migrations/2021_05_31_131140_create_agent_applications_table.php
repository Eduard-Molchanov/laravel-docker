<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("insurance_companies");
            $table->string("title");
            $table->text("description");
            $table->string("logo");
            $table->string("photos");
            $table->string("working_hours");
            $table->text("office_addresses");
            $table->string("inn")->unique();
            $table->string("ogrn")->unique();
            $table->string("kpp");
            $table->string("full_name");
            $table->string("short_name");
            $table->text("license");
            $table->text("insurance_products");
            $table->string('email');
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
        Schema::dropIfExists('agent_applications');
    }
}
