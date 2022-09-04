<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId)->load('products');
        }
        return response()->json($order);
    }

    public function cartConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('home');
        }
        $order = Order::findOrFail($orderId);
        $sum = $order->getFullSum();
        $success = $order->saveOrder($request->name, $request->email, $request->number, $sum, 1);
        if ($success) {
            session()->flash('success', 'Order confirmed');
        } else {
            session()->flash('warning', 'Order failed');
        }
    }

    public function cartPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('home');
        }
        $order = Order::findOrFail($orderId);
    }

    public function cartAdd($id)
    {

        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        $product = Product::find($id);

        if ($order->products->contains($product->id)) {
            $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->price = $product->price;
            $pivotRow->update();
        } else {
            $order->products()->attach($product->id);
        }
    }

    public function quantityChange(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $total = $product->price * $request->quantity;
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $product = Product::find($request->product_id);
        $order = Order::findOrFail($orderId);
        if ($order->products->contains($product->id)) {
            $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
            if ($request->quantity == 0) {
                $order->products()->detach($product->id);
            } else {
                $pivotRow->count = $request->quantity;
                $pivotRow->update();
            }
        }
        return response($total);
    }
}
