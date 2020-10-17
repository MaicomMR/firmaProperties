<?php

namespace App\Http\Controllers;

use App\Category;
use App\EstateModel;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function home()
    {
        $categoryCount = EstateModel::select('categories_id', DB::raw('count(*) as total'))
            ->groupBy('categories_id')
            ->get();

        $subCategoryCount = EstateModel::select('sub_categories_id', DB::raw('count(*) as total'))
            ->groupBy('sub_categories_id')
            ->get();

        $totalEstatesValue = EstateModel::sum('value');
        $totalEstatesCount = EstateModel::count('id');
        $totalAssignedEstatesCount = EstateModel::where('employee_id', '!=', null)->count();
        $totalUnassignedEstatesCount = EstateModel::where('employee_id', '=', null)->count();
        $totalDisabledEstatesCount = EstateModel::onlyTrashed()->count();

        $categoryNumber = [];
        $categoryLabel = [];
        $categoryColor = [];

        $subCategoryNumber = [];
        $subCategoryLabel = [];
        $subCategoryColor = [];

        foreach ($categoryCount as $category) {
            array_push($categoryNumber, $category->total);
            $estateLabelQuery = Category::all()->where('id', '=', $category->categories_id)->first();
            array_push($categoryLabel, $estateLabelQuery->name);
        }

        foreach ($subCategoryCount as $subCategory) {
            array_push($subCategoryNumber, $subCategory->total);
            $subCategoryLabelQuery = SubCategory::all()->where('id', '=', $subCategory->sub_categories_id)->first();
            array_push($subCategoryLabel, $subCategoryLabelQuery->name);
        }

        $categoryColor = $this->generateColor(count($categoryNumber));
        $subCategoryColor = $this->generateColor(count($subCategoryNumber));

        return view('home.homeBasePage')->with([
            'categoryNumber' => $categoryNumber,
            'categoryLabel' => $categoryLabel,
            'categoryColor' => $categoryColor,
            'subCategoryNumber' => $subCategoryNumber,
            'subCategoryLabel' => $subCategoryLabel,
            'subCategoryColor' => $subCategoryColor,
            'totalEstatesValue' => $totalEstatesValue,
            'totalEstatesCount' => $totalEstatesCount,
            'totalAssignedEstatesCount' => $totalAssignedEstatesCount,
            'totalUnassignedEstatesCount' => $totalUnassignedEstatesCount,
            'totalDisabledEstatesCount' => $totalDisabledEstatesCount,
        ]);
    }

    function generateColor($NumberOfColors)
    {
        $colorsArray = [];

        for ($color = 0; $color < $NumberOfColors; $color++) {
            $colorRed = rand(40, 240);
            $colorGreen = rand(40, 240);
            $colorBlue = rand(40, 240);
            $alpha = 0.75;

            $finalColor = 'rgba(' . $colorRed . ', ' . $colorGreen . ', ' . $colorBlue . ', ' . $alpha . ')';
            array_push($colorsArray, $finalColor);
        }

        return $colorsArray;
    }
}
