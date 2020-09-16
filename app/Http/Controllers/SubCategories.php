<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategories extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = \App\Category::all();
        $subCategories = \App\SubCategory::all();

        return view('admin.categoriesAndSubCategories.subCategoriesForm')->with([
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
            'subCategory' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $subCategory = new SubCategory();

            $subCategory->name = $request->subCategory;
            $subCategory->save();

            return redirect()->back()->with('message', 'Sub-categoria cadastrada com sucesso.');
        }
    }
}
