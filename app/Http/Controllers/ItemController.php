<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\View\View;

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
}
