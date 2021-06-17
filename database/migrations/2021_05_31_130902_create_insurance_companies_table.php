<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('insurance_companies', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->text("description")->nullable();
            $table->string("logo")->nullable();
            $table->string("photos")->nullable();
            $table->string("working_hours")->nullable();
            $table->text("office_addresses")->nullable();
            $table->string("inn")->unique()->nullable();
            $table->string("ogrn")->unique()->nullable();
            $table->string("kpp")->nullable();
            $table->string("full_name")->nullable();
            $table->string("short_name")->nullable();
            $table->text("license")->nullable();
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
        Schema::dropIfExists('insurance_companies');
    }
}
