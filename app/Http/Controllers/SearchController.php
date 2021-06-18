<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index ()
    {

        $products = null;
        $s = null;
        return view("pages.search", compact("products","s"));
    }

    public function search (Request $request)
    {
        $request->validate([
            "s" => "required",
        ]);
        if ($request->s) {
            $s = $request->s;
//        dd($s);
            $products = Product::where("title", "LIKE", "%$s%")->orderBy("title")->paginate(10);

        } else {
            $products = null;
        }

        return view("pages.search", compact("products", "s"));
    }
}
