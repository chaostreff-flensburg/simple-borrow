<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\View\View;
use App\Mail\ItemSuggested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    public function guest(): View
    {
        return view('templates.item.guest');
    }

    public function index(): View
    {
        return view('templates.item.index');
    }

    public function show(Item $item): View
    {
        return view('templates.item.show', compact('item'));
    }

    public function print(Item $item): View
    {
        return view('templates.item.print', compact('item'));
    }

    public function transaction(Item $item): View
    {
        return view('templates.item.transaction', compact('item'));
    }

    public function extend(Item $item): View
    {
        return view('templates.item.extend', compact('item'));
    }

    public function suggest(): View
    {
        return view('templates.item.suggest');
    }

    public function storeSuggestion(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->image) {
            $path = $request->file('image')->store('images', 'public');
        }

        $item = Item::create([
            'name' => request()->input('name'),
            'description' => request()->input('description'),
            'image' => $path ?? null,
            'approved' => false,
        ]);

        if(config('app.approvingUserEmail')) {
            Mail::to(config('app.approvingUserEmail'))->queue(new ItemSuggested($item));
        }

        return redirect()->route('home');
    }
}
