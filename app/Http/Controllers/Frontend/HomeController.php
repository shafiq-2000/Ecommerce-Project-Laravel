<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Unit;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->latest()->limit(12)->get();
        return view('frontend.index', compact('categories', 'products'));
    }


    public function products_details($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        // $sizes = Size::all();
        // $colors = Color::all();
        $products = Product::findOrFail($id);
        $cat_id = $products->cat_id;
        $related_products = Product::where('cat_id', $cat_id)->limit(4)->get();
        return view('frontend.pages.product-details', compact('categories', 'subcategories', 'brands', 'units', 'products', 'related_products'));
    }


    public function product_by_cat($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::withCount('products')->where('status', 1)->get();
        $brands = Brand::withCount('products')->where('status', 1)->get();
        // $brands = Brand::where('status', 1)->get();
        $products = Product::where('status', 1)->where('cat_id', $id)->limit(12)->get();
        return view('frontend.pages.product-by-cat', compact('categories', 'subcategories', 'brands', 'products'));
    }

    public function product_cat_count(){

    }
}
