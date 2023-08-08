<?php

namespace App\Http\Controllers;

use App\Mail\ItemBorrowed;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
            'transaction_type' => 'required|integer',
            'return_date' => 'date',
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

        $item = Item::find($request->item_id);
        $item->borrow_state = $request->transaction_type;
        $item->save();

        if ((int) $request->transaction_type === Transaction::BORROWED) {
            Mail::to($request->email)->queue(new ItemBorrowed($item));
        }

        return redirect()->route('item.show', $request->item_id);
    }
}
