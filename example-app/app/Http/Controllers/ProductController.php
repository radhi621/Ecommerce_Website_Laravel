<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products')); // Assuming the view is named 'dashboard.blade.php'
    }

    public function store(Request $request)
    {       
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Validate that it is an image
        ]);
        
        // Handle the file upload
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = pathinfo($filenameWithExt, PATHINFO_FILENAME) . '.' . $extension; // Keep the original filename
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $publicPath = Storage::url($path);
        } else {
            $fileNameToStore = 'noimage.jpg';
            $publicPath = Storage::url('public/images/noimage.jpg');
        }
        
        // Create a new product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'path' => $publicPath, // Store the public path of the image
        ]);

        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|string|max:255',
            'image' => 'image|max:2048', // Optional and must be an image if provided
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->path && Storage::exists('public/images/' . basename($product->path))) {
                Storage::delete('public/images/' . basename($product->path));
            }
            
            // Upload new image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = pathinfo($filenameWithExt, PATHINFO_FILENAME) . '.' . $extension; // Keep the original filename
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $publicPath = Storage::url($path);
            $product->path = $publicPath;
        }

        // Update the product details
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->save();

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the image if it exists and is not a placeholder
        if ($product->path && $product->path != Storage::url('public/images/noimage.jpg')) {
            Storage::delete('public/images/' . basename($product->path));
        }
        
        $product->delete();
        return redirect()->route('dashboard');
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        if ($product->quantity <= 0) {
            return response()->json(['error' => 'Product is out of stock'], 404);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->path  // Ensure the image path is used correctly
            ];
        }

        // Decrement the product quantity
        $product->decrement('quantity');

        session()->put('cart', $cart);
        return response()->json(['message' => 'Product added to cart']);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);  // Remove item from cart
            session()->put('cart', $cart);
            return response()->json(['success' => 'Product removed successfully']);
        }
        return response()->json(['error' => 'Product not found in cart'], 404);
    }

    public function filter(Request $request)
    {
        // Filter logic as previously described
        $query = Product::query();
        if ($request->has('price') && !in_array('all', $request->price)) {
            $query->where(function($q) use ($request) {
                foreach ($request->price as $range) {
                    list($min, $max) = explode('-', $range);
                    $q->orWhereBetween('price', [(int)$min, (int)$max]);
                }
            });
        }
        $products = $query->get();
        return view('products.index', compact('products'));
    }
}
