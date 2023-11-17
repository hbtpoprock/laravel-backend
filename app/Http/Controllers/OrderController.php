<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $order = Order::create([
            'order_id' => uniqid(), // Generate a unique order ID
            'user_id' => auth()->user()->id,
            'food_ids' => $request->input('food_ids'),
            'status' => 'payment_completed', // Initial status
            'total_price' => $request->input('total_price'),
        ]);

        return response()->json($order, 201);
    }

    public function index()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->food_ids = $request->input('food_ids', $order->food_ids);
        $order->status = $request->input('status', $order->status);
        $order->total_price = $request->input('total_price', $order->total_price);
        $order->save();

        return response()->json($order);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
