<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    //

    public function Checkout()
    {
        
        $oldcartItems = Cart::where('user_id', session('user')->id)->get();
        //check for out of stock items
        foreach($oldcartItems as $item) {
           if(!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
               $removeItem = Cart::where('user_id', session('user')->id)
                   ->where('prod_id', $item->prod_id)
                   ->first();
                   $removeItem->delete();
           }
        }
        // get the fresh cart items after deletion the out of stock items
        $cartItems = Cart::where('user_id', session('user')->id)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('view_cart')->with('error', 'Your cart is empty. Please add items to your cart before proceeding to checkout.');
        }
        return view('checkout', compact('cartItems'));
    }

    public function placeOrder(Request $request)
    {


        $order = new Order();
        $order->user_id = session('user')->id;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->status = 0; // Default status
        $order->message = $request->input('message');
        //calculate total price
        $total = 0;
        $cartItemsTotal = Cart::where('user_id', session('user')->id)->get();
        foreach ($cartItemsTotal as $prod) {
            $total += $prod->product ? $prod->product->selling_price * $prod->prod_qty : 0;
        }
        //insert total price in order table
        $order->total_price = $total;
        $userName = preg_replace('/\s+/', '', strtolower(session('user')->name));
        $order->tracking_no = $userName . rand(100000, 999999);
        $order->save();

        $cartItems = Cart::where('user_id', session('user')->id)->get();
        foreach ($cartItems as $item) {

           OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->product ? $item->product->selling_price : 0,
            ]);

            // Update product quantity
            $product = Product::find($item->prod_id);
            if ($product) {
                $product->qty -= $item->prod_qty;
                $product->save();
            }
        }

        // Update product quantity
        if (session('user')->address == null) {
              $user =  User::where('id', session('user')->id)->first();
              $user->name = $request->input('name');            
              $user->address = $request->input('address');
              $user->phone = $request->input('phone');
              $user->city = $request->input('city');
              $user->state = $request->input('state');
              $user->update();
            }

        $cartItems = Cart::where('user_id', session('user')->id)->get();
        Cart::destroy($cartItems);
        return redirect('/')->with('success', 'Order placed successfully!');
        // Validate and process the order
    }    
    
    
    public function razorPay(Request $request)
    {
       $cartItems = Cart::where('user_id', session('user')->id)->get();
       if ($cartItems->isEmpty()) {
           return response()->json(['status' => 'error', 'message' => 'Your cart is empty. Please add items to your cart before proceeding to checkout.']);
       }
       $totalprice = 0;
         foreach ($cartItems as $item) {
            $totalprice += $item->product ? $item->product->selling_price * $item->prod_qty : 0;
         }
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');

        return response()->json([
            'status' => 'success',
            'totalprice' => $totalprice,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'state' => $state,
        ]);

    }
}

