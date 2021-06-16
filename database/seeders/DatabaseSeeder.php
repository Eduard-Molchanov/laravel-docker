<?php

namespace Database\Seeders;

use App\Models\InsuranceCompany;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run ()
    {
//         \App\Models\User::factory(10)->create();
         User::factory(10)->create();
//        ProductCategory::factory(20)->create();
        Product::factory(120)->create();
//        InsuranceCompany::factory(20)->create();
//        $this->call(UserSeeder::class);

    }
}
