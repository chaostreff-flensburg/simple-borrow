<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function index(): View
    {
        $items = Item::all();

        return view('templates.item.index', compact('items'));
    }

    public function create(): View
    {
        return view('templates.item.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        Item::create($request->all());

        return redirect()->route('item.index');
    }

    public function show(Item $item): View
    {
        $transactions = $item->transactions()->get()->sortByDesc('created_at');
        return view('templates.item.show', compact('item', 'transactions'));
    }

    public function delete(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('item.index');
    }

    public function update(Request $request, Item $item): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $item->update($request->all());

        return redirect()->route('item.index');
    }

    public function edit(Item $item): View
    {
        return view('templates.item.edit', compact('item'));
    }

    public function transaction(Item $item): View
    {
        return view('templates.item.transaction', compact('item'));
    }
}
