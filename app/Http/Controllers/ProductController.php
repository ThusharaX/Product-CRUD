<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products['products'] = $this->product->All();
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $newImageName = time() . '-' . $request->name . '.' .
        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $this->product->create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $newImageName,
        ]);

        return redirect()->route('product.index');
    }

    // Edit a product
    public function edit($id)
    {
        $product = $this->product->find($id);
        return view('product.edit')->with('product', $product);
    }

    // Update a product
    public function update($id, Request $request)
    {
        // check if image is updated
        if ($request->hasFile('image')) {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $newImageName = time() . '-' . $request->name . '.' .
            $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);

            $this->product->find($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $newImageName,
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
            ]);

            $this->product->find($id)->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);
        }

        return redirect()->route('product.index');
    }

    // Delete a product
    public function delete($product_id)
    {
        $product = $this->product->find($product_id);
        $product->delete();
        return redirect()->back()->with('success','Product Deleted');;
    }

    // Set Active
    public function setActive($product_id)
    {
        $product = $this->product->find($product_id);
        $product->status='active';
        $product->update();
        return redirect()->back()->with('success','Product Activated');;
    }

    // Set Inactive
    public function setInactive($product_id)
    {
        $product = $this->product->find($product_id);
        $product->status='inactive';
        $product->update();
        return redirect()->back()->with('success','Product Inactivated');;
    }
}
