<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index ()
    {
        $products=null;
    return view("pages.search",compact("products"));
    }

}
