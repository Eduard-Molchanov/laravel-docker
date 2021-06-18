<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index ()
    {

        $products = null;
        return view("pages.search", compact("products"));
    }

    public function search (Request $request)
    {
        if ($request->s) {
            $s = $request->s;
//        dd($s);
            $products = Product::where("title", "LIKE", "%$s%")->orderBy("title")->paginate(10);

        } else {
            $products = null;
        }

        return view("pages.search", compact("products"));
    }
}
