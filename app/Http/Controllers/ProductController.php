<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use domain\Facades\ProductFacade;

class ProductController extends Controller
{
    public function index()
    {
        $products['products'] = ProductFacade::index();
        return view('product.index')->with($products);
    }

    // Add a new product
    public function create()
    {
        return view('product.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        ProductFacade::store($request);
        return redirect()->route('product.index');
    }

    // Edit a product
    public function edit($id)
    {
        $product = ProductFacade::edit($id);
        return view('product.edit')->with('product', $product);
    }

    // Update a product
    public function update($id, Request $request)
    {
        ProductFacade::update($id, $request);
        return redirect()->route('product.index');
    }

    // Delete a product
    public function delete($product_id)
    {
        ProductFacade::delete($product_id);
        return redirect()->route('product.index')->with('success','Product Deleted');;
    }

    // Set Active
    public function setActive($product_id)
    {
        ProductFacade::setActive($product_id);
        return redirect()->back()->with('success','Product Activated');;
    }

    // Set Inactive
    public function setInactive($product_id)
    {
        ProductFacade::setInactive($product_id);
        return redirect()->back()->with('success','Product Inactivated');;
    }

    // View a product
    public function view($product_id)
    {
        $product = ProductFacade::view($product_id);
        return view('product.view')->with('product', $product);
    }
}
