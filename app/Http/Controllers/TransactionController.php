<?php

namespace App\Http\Controllers;

use App\Mail\ItemBorrowed;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'item_id' => 'required|integer',
            'transaction_type' => 'required|integer',
            'return_date' => 'date|after_or_equal:today',
            'note' => 'string|nullable',
            'email' => 'email|nullable',
            'name' => 'string|nullable',
        ]);

        Transaction::create(
            [
                'item_id' => (int) $request->item_id,
                'transaction_type' => $request->transaction_type,
                'return_date' => $request->return_date,
                'note' => $request->note,
                'email' => $request->email,
                'name' => $request->name,
            ]
        );

        if ((int) $request->transaction_type === Transaction::BORROW) {
            Mail::to($request->email)->queue(new ItemBorrowed(Item::find($request->item_id)));
        }

        return redirect()->route('item.show', $request->item_id);
    }

    public function extend(Request $request): RedirectResponse
    {
        $request->validate([
            'item_id' => 'required|integer',
            'return_date' => 'date|after_or_equal:today',
        ]);

        $transaction = Transaction::where('item_id', $request->item_id)
            ->where('transaction_type', Transaction::BORROW)
            ->orderBy('created_at', 'desc')
            ->first();

        $transaction->return_date = $request->return_date;
        $transaction->save();

        return redirect()->route('item.show', $request->item_id);
    }
}
