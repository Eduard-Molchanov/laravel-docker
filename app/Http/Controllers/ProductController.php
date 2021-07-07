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
//            $folder = date('d-m-Y') . "-n";
            $folder = date('d-m-Y');
//dump($folder);
//            $photo = asset("storage/app/".$request->file("photos")->store("images/{$folder}"));
//            $photo = public_path( $request->file("photos")->store("images/{$folder}"));
//            $photo = public_path( $request->file("photos")->store("{$folder}"));
//            $photo = $request->file("photos")->store("public/{$folder}");
//            $photo = "public/storage/app/" . $request->file("photos")->store("images/{$folder}");
//            $photo = "public/storage/app/" . $request->file("photos")->store("images/{$folder}");
//            $photo = "storage/app/" . $request->file("photos")->store("images/{$folder}");
//            $photo =  $request->file("photos")->store("/storage/{$folder}");
//             echo "<img src=".asset("/img/123.jpg")." width=350><br><br>";
////             echo "<img src='/public/storage/123.jpg'>";
//            echo "<img src=".asset("storage/123.jpg")." width=350><br>";
//             echo "<img src='img/123.jpg'>";
//             echo "<img src=\"$photo\">";
//            dd($photo);
//            $photo = $request->file("photos")->store("img/{$folder}");
            $photo =  $request->file("photos")->store("/");
            echo "<img src=" . asset("storage/456.jpg") . " width=350><br>";
//            echo "<img src=".asset("storage/42/123.jpg")." width=350><br>";
            echo "<img src=" . asset("storage/public/123.jpg") . " width=350><br>";
            echo "<img src=" . asset("storage/" . $photo) . " width=350><br><br>";
            echo "storage/" . $photo;
            dump($photo);
            $url = Storage::get($photo);
//            $img = Image::make($photo);

            $img = Image::make($url);


            dump($height = $img->height());
           dump($width = $img->width());
            if ($height >= 1501) {
                $img->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            if ($width >= 1501) {
                $img->resize(null, 1500, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
           dump($photo);
            $img->save("z-".$photo);


        }


        Product::create([
            "title" => $request->title,
            "cost_per_year" => $request->cost_per_year,
            "description" => $request->description,
            "agent_id" => $request->agent_id,
            "advantages" => $request->advantages,
            "photos" => $photo ?? null,
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
