<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = \App\Category::all();
        $subCategories = \App\SubCategory::all();


        return view('admin.categoriesAndSubCategories.categoriesIndex')->with([
            'categories'=>$categories,
            'subCategories'=>$subCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = \App\Category::all();
        $subCategories = \App\SubCategory::all();

        return view('admin.categoriesAndSubCategories.categoriesForm')->with([
            'categories'=>$categories,
            'subCategories'=>$subCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $category = new Category();

            $category->name = $request->category;
            $category->save();

            return redirect()->back()->with('message', 'Categoria cadastrada com sucesso.');
        }
    }
}
