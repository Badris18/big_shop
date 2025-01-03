<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();

        $transforamedCategories =$categories->map(function($row){

            return[
                'id'=>$row->id,
                'name' =>$row->name,
                // 'description'=> $row->description,
                // 'status'=> $row ->status,
                // 'image_path'=>$row->image_path,
                // 'buying_price'=>$row->buying_price,
                // 'selling_price'=>$row->selling_price,
                // 'expected_profit'=>$row->expected_profit,
                // 'earned_profit'=>$row->earned_profit,
                // 'company_id'=>$row->$company->name,
                
            ];
        });

        return response()->json(['data' => $transforamedCategories],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
