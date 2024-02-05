<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return response()->json($payments);
    }

    public function show($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        return response()->json($payment);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'metode_pembayaran' => 'required',
            'jumlah_pembayaran' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
        }
    
        $user = Auth::user();
    
        // Ensure the authenticated user owns the order
        $order = $user->orders()->find($request->input('order_id'));
    
        if (!$order) {
            return response()->json(['message' => 'Order tidak ditemukan'], 404);
        }
    
        // Check if the order already has a payment
        if ($order->payment) {
            return response()->json(['message' => 'Pembayaran sudah ada untuk pesanan ini'], 422);
        }
    
        // Check if the order has already been paid by another means (additional check)
        if ($order->is_paid) {
            return response()->json(['message' => 'Pesanan ini sudah dibayar'], 422);
        }
    
        $payment = $order->payment()->create($request->all());
    
        return response()->json($payment, 201);
    }
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'metode_pembayaran' => 'required',
            'jumlah_pembayaran' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
        }

        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        $payment->update($request->all());
        return response()->json($payment);
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        $payment->delete();
        return response()->json(null, 204);
    }
}
