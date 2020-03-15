<?php


namespace App\Http\Controllers;

use \App\EstateModel;
use \App\Category;
use \App\SubCategory;
use Illuminate\Http\Request;
use Validator;

class Estate extends Controller
{

    public function search($id){

        $Estate = \App\EstateModel::find($id);

        $categoriesPlucked = Category::pluck('name', 'id');
        $subCategoriesPlucked = SubCategory::pluck('name', 'id');

        return view('admin.add')->with([
            'categoriesPlucked' => $categoriesPlucked,
            'subCategoriesPlucked' => $subCategoriesPlucked,
            'estate_object'=>$Estate,
        ]);
    }

    public function index()
    {
    $EstateList = EstateModel::all();

    return view('admin.estates.estateIndex')
        ->with(['EstateList' => $EstateList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesPlucked = Category::pluck('name', 'id');
        $subCategoriesPlucked = SubCategory::pluck('name', 'id');

        return view('admin.add')->with([
            'categoriesPlucked' => $categoriesPlucked,
            'subCategoriesPlucked' => $subCategoriesPlucked,
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



        $validator = Validator::make($request->all(), [ // <---
            'name' => 'required|max:255|min:2',
            'label_id' => 'required|unique:estates|numeric',
            'value' => 'required|numeric',
            'categories_id' => 'required',
            'sub_categories_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $estate = new EstateModel();

            $estate->name = $request->name;
            $estate->value = $request->value;
            $estate->label_id = $request->label_id;
            $estate->categories_id = $request->categories_id;
            $estate->sub_categories_id = $request->sub_categories_id;
            $estate->seller_id = $request->seller_id;
            $estate->estate_photo = null;

//dd($estate);
            $estate->save();
            return back()->withInput();
        }
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
//        dd('edit' + $id);
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
