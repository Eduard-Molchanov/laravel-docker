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
