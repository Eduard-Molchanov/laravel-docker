<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

//use Intervention\Image\Image;

use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function __construct(Request $request)
    {
        dump($request->route()->getName());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.products");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return redirect()->route("agent");
        return view("pages.agent");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            "photos" => "nullable|image|mimes:jpeg,jpg,bmp,png|dimensions:min_width=300|dimensions:min_height=300"
        ]);


        if ($request->hasFile("photos")) {

            $folder = date('d-m-Y');

            $photo = $request->file("photos")->store("images/{$folder}");
            $url = Storage::get($photo);
            $img = Image::make($url);

            $height = $img->height();
            $width = $img->width();
            if ($height >= 1501) {
                $img->resize(null, 1500, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            if ($width >= 1501) {
                $img->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $imgUrl = "img/" . time() . ".jpg";
            $img->save($imgUrl);


        }


        Product::create([
            "title" => $request->title,
            "cost_per_year" => $request->cost_per_year,
            "description" => $request->description,
            "agent_id" => $request->agent_id,
            "advantages" => $request->advantages,
            "photos" => $imgUrl ?? null,
            "cost_for_6_months" => $request->cost_for_6_months,
            "cost_per_month" => $request->cost_per_month,
            "amount_of_discount" => $request->amount_of_discount,
            "product_category_id" => $request->product_category_id,
            "status" => $request->status,
            "offer_expiration_date" => $request->offer_expiration_date,
            "options" => $request->options
        ]);
        return redirect()->back()->with("success", "Информация успешно добавлена в базу!");
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("pages.product", compact("id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pages.product-edit", compact("id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dump($id);
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dump(__METHOD__);
        dd($id);
    }
}
