<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = ProductCategory::all();
        return view("pages.categories", compact("categories"));
    }

    public function category ($slug)
    {
        $products = Product::where("product_category_id", $slug)->get();
        return view("pages.category", compact("products", "slug"));
    }

    public function productDetail ($id)
    {

        $product = Product::where("id", $id)->first();
        return view("pages.product-detail", compact("product"));
    }
}
