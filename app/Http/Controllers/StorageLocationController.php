<?php

namespace App\Http\Controllers;

use App\Models\StorageLocation;
use Illuminate\View\View;

class StorageLocationController extends Controller
{
    public function index(): View
    {
        return view('templates.storageLocation.index',
            ['storageLocations' => StorageLocation::all()]
        );
    }

    public function show(StorageLocation $storageLocation): View
    {
        return view('templates.storageLocation.show',
            ['storageLocation' => $storageLocation]
        );
    }

    public function print(StorageLocation $storageLocation): View
    {
        return view('templates.storageLocation.print',
            ['storageLocation' => $storageLocation]
        );
    }
}
