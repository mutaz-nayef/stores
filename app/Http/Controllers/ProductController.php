<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // Retrieve the category and its associated subcategories
        if (request('category')) {
            $category_name = request('category');
            $subcategory_name = request('subcategory');
            $category = Category::where('name', $category_name)->first();
            $subcategories = Subcategory::whereHas('category', function ($query) use ($category_name) {
                $query->where('name', $category_name);
            })->get();
            if (request('category') && request('subcategory')) {

                $products = Product::whereHas('subcategory', function ($query) use ($subcategory_name, $category) {
                    $query->where('name', $subcategory_name)
                        ->where('category_id', $category->id);
                })->paginate(8);
            } else {
                $products = Product::where('category_id', $category->id)->get();
            }
        } else {
            $subcategories =  SubCategory::all();
            $products = Product::latest()->paginate(8);
        }
        // dd($products);
        return response()->view('cms.products.index', [
            'products' => $products,
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'subcategories' => $subcategories,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        //
    }
}
