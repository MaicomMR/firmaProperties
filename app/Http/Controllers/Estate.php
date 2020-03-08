<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Estate extends Controller
{

    public function search($id){

        $categories = \App\Category::all();
        $subCategories = \App\SubCategory::all();

        $Estate = \App\Estate::find($id);
//        dd($Estate);

        return view('admin.add')->with([
            'action'=>'see',
            'estate'=>$Estate,
            'categories'=>$categories,
            'subCategories'=>$subCategories
        ]);
    }

    public function index()
    {

    $EstateList = \App\Estate::all();

    return view('admin.estates.estateIndex')->with(['EstateList'=>$EstateList]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        $subCategories = \App\SubCategory::all();


        return view('admin.add')->with([
            'categories'=>$categories,
            'subCategories'=>$subCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
