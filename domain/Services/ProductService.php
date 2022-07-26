<?php

namespace domain\Services;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService {
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        return $products['products'] = $this->product->All();
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
    }

    // Edit a product
    public function edit($id)
    {
        return $product = $this->product->find($id);
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

            // Delete old image
            $oldImage = $this->product->find($id)->image;
            if (file_exists(public_path('images/' . $oldImage))) {
                unlink(public_path('images/' . $oldImage));
            }

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
    }

    // Delete a product
    public function delete($product_id)
    {
        $product = $this->product->find($product_id);

        // Delete image
        $image = $product->image;
        if (file_exists(public_path('images/' . $image))) {
            unlink(public_path('images/' . $image));
        }

        $product->delete();

    }

    // Set Active
    public function setActive($product_id)
    {
        $product = $this->product->find($product_id);
        $product->status='active';
        $product->update();
    }

    // Set Inactive
    public function setInactive($product_id)
    {
        $product = $this->product->find($product_id);
        $product->status='inactive';
        $product->update();
    }

    // View a product
    public function view($product_id)
    {
        return $this->product->find($product_id);
    }
}

?>
