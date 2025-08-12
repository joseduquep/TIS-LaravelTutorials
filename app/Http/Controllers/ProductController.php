<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        
        // Get products from session or use default ones
        $products = session('products', [
            ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => 1000],
            ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => 2000],
            ["id" => "3", "name" => "iPad", "description" => "Best iPad", "price" => 3000],
        ]);
        
        $viewData["products"] = $products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        // Convert string id to integer
        $productId = (int) $id;
        
        // Get products from session or use default ones
        $products = session('products', [
            ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => 1000],
            ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => 2000],
            ["id" => "3", "name" => "iPad", "description" => "Best iPad", "price" => 3000],
        ]);
        
        // Check if the product ID is valid
        if (!isset($products[$productId - 1])) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = $products[$productId - 1];
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;
        $viewData["description"] = $product["description"];
        $viewData["price"] = $product["price"];
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);

        // Get current products from session or use default ones
        $products = session('products', [
            ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => 1000],
            ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => 2000],
            ["id" => "3", "name" => "iPad", "description" => "Best iPad", "price" => 3000],
        ]);

        // Add the new product to the array
        $newId = count($products) + 1;
        $products[] = [
            "id" => (string) $newId,
            "name" => $request->input('name'),
            "description" => "New product",
            "price" => (int) $request->input('price')
        ];

        // Store updated products in session
        session(['products' => $products]);

        return redirect()->route('product.success');
    }

    public function success(): View
    {
        $viewData = [];
        $viewData["title"] = "Product Created - Online Store";
        $viewData["subtitle"] = "Product Created Successfully";
        
        return view('product.success')->with("viewData", $viewData);
    }
}
