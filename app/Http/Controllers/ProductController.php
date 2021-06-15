<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct (Request $request)
    {
        dump($request->route()->getName());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        return view("pages.products");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
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
    public function store (Request $request)
    {
        $this->validate($request, [
            'photos' => 'image|mimes:jpeg,png,jpg,svg|dimensions:min_width=>300,min_height>300',
        ]);

        if( $request->hasFile('photos')){
            // Имя и расширение файла
            $filenameWithExt = $request->file('photos')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Расширение
            $extention = $request->file('photos')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "photos/".$filename."_".time().".".$extention;
            // Сохраняем файл
            $path = $request->file('photos')->storeAs('uploads/', $fileNameToStore);
        }
//        $path = $request->file("photos")->storeAs("uploads", "public");
        dump($path);
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        return view("pages.product", compact("id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
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
    public function update (Request $request, $id)
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
    public function destroy ($id)
    {
        dump(__METHOD__);
        dd($id);
    }
}
