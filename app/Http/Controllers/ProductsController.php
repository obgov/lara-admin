<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected Product $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('products', ['products' => Product::all(['name']), 'categories' => Category::all('id', 'name')]);
    }

    public function addProduct(Request $request): \Illuminate\Http\JsonResponse
    {
        $product = Product::create([
        'name' => $request->product_name,
        'description' => $request->product_desc,
        'price' => $request->product_price,
        'category_id' => $request->category,
        'is_active' => $request->has('product_availability')]);

        if($product) {
            return response()->json(['success' => true, 'response' => 'Продукт добавлен'], 201);
        }
        return response()->json(['success' => false, 'response' => 'Неизвестная ошибка'], 500);
    }
}
