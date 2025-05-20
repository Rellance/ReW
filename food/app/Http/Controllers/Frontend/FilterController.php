<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Product;
use Carbon\Carbon;

class FilterController extends Controller
{
    public function ListRestaurant(){
        $products = Product::all();
        return view('frontend.list_restaurant',compact('products'));
    }
    

    public function FilterProducts(Request $request)
    {


        $categoryId = $request->input('categories');
        $menuId = $request->input('menus');
        $cityId = $request->input('cities');

        $products = Product::query();
        if ($categoryId) {
            $products->whereIn('category_id', $categoryId);
        }
        if ($menuId) {
            $products->whereIn('menu_id', $menuId);
        }
        if ($cityId) {
            $products->whereIn('city_id', $cityId);
        }

        $filteredProducts = $products->get();

        return view('frontend.list_product', compact('filteredProducts'))->render();

    }
    


} 