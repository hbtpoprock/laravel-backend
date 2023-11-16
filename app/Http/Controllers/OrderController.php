<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Create a new order
    public function create(Request $request)
    {
        // Validate the request and create a new order
        $order = Order::create([
            'order_id' => uniqid(), // Generate a unique order ID
            'user_id' => auth()->user()->id,
            'food_ids' => $request->input('food_ids'),
            'status' => 'payment_completed', // Initial status
            'total_price' => $request->input('total_price'),
        ]);

        return response()->json($order, 201);
    }

    // Read all orders
    public function index()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    // Read a specific order
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response()->json($order);
    }

    // Update an order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Update order properties as needed
        $order->status = $request->input('status', $order->status);
        $order->save();

        return response()->json($order);
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
