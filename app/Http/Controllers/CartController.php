<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = [];
        $total_price = 0;
        if (auth()->user()) {
            $user = auth()->user();

            $cart = Cart::where('user_id', $user->id)->where('checkout_id', '<', 2)->with('product')->get();
            foreach ($cart as $item) {
                $discount = Category::where('id', $item->product->category_id)->get()->first()->discount;
                $total_price += $item->product->product_price * $item->quantity - ($item->product->product_price * $discount / 100);
                
            }
            // $cartCount = count($cart);
            // Now, $cartCount contains the count of items in the cart
        } else {

            $cart = session('cart') ?? [];

            if ($cart) {
                foreach ($cart as $item) {
                    $total_price += $item['price'] * $item['quantity'];
                }
            }
        }




        return view('pages.cart', compact('cart', 'total_price'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $updatedQuantity = $request->input('quantity');

        if (auth()->user()) {

            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->where('product_id', $id)->first();

            if ($cartItem) {
                $cartItem->update(['quantity' => $updatedQuantity]);
            }
        } else {

            $cart = session('cart');
            if ($cart !== null) {
                foreach ($cart as $key => $item) {
                    if ($item['id'] == $id) {
                        $cart[$key]['quantity'] = $updatedQuantity;
                        session(['cart' => $cart]);
                        break;
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Price updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()) {
            // If the user is authenticated, delete the item from the database
            $user = auth()->user();
            Cart::where('user_id', $user->id)->where('product_id', $id)->delete();
        } else {
            // If the user is not authenticated, delete the item from the session
            $cart = session('cart');
            if ($cart !== null) {
                foreach ($cart as $key => $item) {
                    if ($item['id'] == $id) {
                        unset($cart[$key]);
                        session(['cart' => $cart]);
                        break;
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Product deleted from the cart successfully');
    }
}