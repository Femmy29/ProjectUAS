<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return Transaction::with('details.product')->get();
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'customer_id' => $request->customer_id,
            'total_price' => $request->total_price,
            'transaction_date' => now(),
        ]);

        foreach ($request->details as $detail) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $detail['product_id'],
                'quantity' => $detail['quantity'],
                'price' => $detail['price'],
            ]);
        }

        return $transaction->load('details.product');
    }
}