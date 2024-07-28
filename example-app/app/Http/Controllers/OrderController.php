<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|alpha',
        'last_name' => 'required|alpha',
        'email' => 'required|email',
        'mobile' => 'required',
        'address1' => 'required',
        'address2' => 'nullable',
        'city' => 'required|alpha',
        'zip' => 'required|numeric'
    ]);

    if ($validatedData['email'] !== Auth::user()->email) {
        return redirect()->back()->withErrors(['email' => 'You must use the email address associated with your account.']);
    }

    DB::beginTransaction();
    try {
        $order = Order::create($validatedData);
        
        // Collecting cart items from session
        $cartItems = session('cart', []);
        $productsDetails = [];

        foreach ($cartItems as $productId => $details) {
            $product = Product::find($productId);
            if ($product) {
                $productsDetails[] = [
                    'name' => $product->name,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ];
            }
        }

        // Send email with products details
        Mail::to($request->email)->send(new MyEmail($order, $productsDetails));

        DB::commit();
        return redirect()->back()->with('success', 'Order placed successfully and receipt sent!');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'There was an error placing the order: ' . $e->getMessage());
    }
}

}
