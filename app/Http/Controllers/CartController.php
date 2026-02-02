<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $id => $details) {
            // Check if price is numeric before multiplication
            $price = isset($details['price']) && is_numeric(str_replace(['.', ','], '', $details['price']))
                ? (float) str_replace(['.', ','], '', $details['price'])
                : 0;
            $total += $price * $details['quantity'];
        }
        return view('cart', compact('cart', 'total'));
    }

    public function addToCart(Request $request)
    {
        $id = md5($request->name); // Use name as ID since we don't have DB IDs
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $request->name,
                "quantity" => 1,
                "price" => $request->price,
                "image" => $request->image
            ];
        }

        session()->put('cart', $cart);

        // Calculate total count
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json(['success' => 'Product added to cart successfully!', 'cart_count' => $count]);
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
