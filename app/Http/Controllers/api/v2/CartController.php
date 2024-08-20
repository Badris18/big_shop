<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;


class CartController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $customer_id = $user->id;

        $carts = Cart::all();

        $transformedCarts = $carts->map(function($cart){
            return[
                'id' => $cart->id,
                'product_id'=>$cart->product->id,
                'name'=>$cart->product->name,
                'qty'=>(int)$cart->qty,
                'price'=>$cart->product->price,
                'image_path'=>$cart->product->getImagePath(),
            ];

            
        });
        $grandTotal =Cart::grandTotal($customer_id);

        return response()->json(['data' => $transformedCarts, 'grand_total'=> $grandTotal],200);
    }

    public function addToCart(Request $request)
    {

        $user =$request->user();

        $customer_id=$user->id;

        $requestData = $request->json()->all();

        $product_id = $requestData['product_id'];

        $product =Product::find($product_id);

        $existingCartItem = Cart::where('product_id', $product_id)
        ->where('customer_id', $customer_id)
        ->first();
    

    if ($existingCartItem) { 
        // If the item is already in the cart, update the quantity
        $existingCartItem->qty += 1;
        $existingCartItem->save();
        return response()->json(["message" => $product->name . " quantity updated in your cart."], 200);
    } else {
        // If the item is not in the cart, create a new cart entry
        Cart::create([
            'product_id' => $product_id,
            'customer_id' => $user->id,
            'qty' => 1,
        ]);
        return response()->json(["message" => $product->name . " added to your cart."], 200);
    }
}

public function removeFromCart(Request $request)
{
    // Get the authenticated user
    $user = $request->user();

    // Retrieve the product and user information from the JSON request body
    $requestData = $request->json()->all();

    $cartItemId = $requestData['cart_id'];

    // Retrieve the cart item
    $cartItem = Cart::find($cartItemId);

    // Check if the cart item exists
    if (!$cartItem) {
        return response()->json(["error" => "Cart item not found."], 404);
    }

    // Check if the cart item belongs to the logged-in user
    if ($cartItem->customer_id != $user->id) {
        return response()->json(["error" => "You are not authorized to remove this item from the cart."], 403);
    }

    // Remove the cart item
    $cartItem->delete();

    return response()->json(["message" => "Item removed from your cart."], 200);
}

public function increaseQuantity(Request $request)
{
    // Get the authenticated user
    $user = $request->user();

    // Retrieve the product and user information from the JSON request body
    $requestData = $request->json()->all();

    $cartItemId = $requestData['cart_id'];

    // Retrieve the cart item
    $cartItem = Cart::find($cartItemId);

    // Check if the cart item exists
    if (!$cartItem) {
        return response()->json(["error" => "Cart item not found."], 404);
    }

    // Check if the cart item belongs to the logged-in user
    if ($cartItem->customer_id != $user->id) {
        return response()->json(["error" => "You are not authorized to update the quantity of this item in the cart."], 403);
    }

    // Increase the quantity
    $cartItem->qty += 1;
    $cartItem->save();

    return response()->json(["message" => "Quantity increased in your cart."], 200);
}


public function decreaseQuantity(Request $request)
{
    // Get the authenticated user
    $user = $request->user();

    // Retrieve the product and user information from the JSON request body
    $requestData = $request->json()->all();

    $cartItemId = $requestData['cart_id'];

    // Retrieve the cart item
    $cartItem = Cart::find($cartItemId);

    // Check if the cart item exists
    if (!$cartItem) {
        return response()->json(["error" => "Cart item not found."], 404);
    }

    // Check if the cart item belongs to the logged-in user
    if ($cartItem->customer_id != $user->id) {
        return response()->json(["error" => "You are not authorized to update the quantity of this item in the cart."], 403);
    }

    // Decrease the quantity, but ensure it doesn't go below 1
    $cartItem->qty = max($cartItem->qty - 1, 1);
    $cartItem->save();

    return response()->json(["message" => "Quantity decreased in your cart."], 200);
}

public function clearCart(Request $request)
{
    // Get the authenticated user
    $user = $request->user();

    $customer_id = $user->id;

    // Retrieve the cart items for the user
    $cartItems = Cart::where('customer_id', $customer_id)->get();

    // Check if any cart items were found
    if ($cartItems->isEmpty()) {
        return response()->json(["error" => "No items found in the cart for the logged-in user."], 404);
    }

    // Check if the cart items belong to the logged-in user
    foreach ($cartItems as $cartItem) {
        if ($cartItem->customer_id != $customer_id) {
            return response()->json(["error" => "You are not authorized to clear the cart. Cart items don't belong to the logged-in user."], 403);
        }
    }

    // Find and delete all cart items for the user
    Cart::where('customer_id', $customer_id)->delete();

    return response()->json(["message" => "Cart cleared successfully."], 200);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
