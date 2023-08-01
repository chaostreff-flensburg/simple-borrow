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
        return view('templates.item.index');
    }

    public function show(Item $item): View
    {
        return view('templates.item.show', compact('item'));
    }

    public function transaction(Item $item): View
    {
        return view('templates.item.transaction', compact('item'));
    }
}
