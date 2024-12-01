<?php

namespace App\Http\Controllers;

use App\Models\NetAssetValue;
use Inertia\Inertia;

class NetAssetValueController extends Controller
{
    public function index()
    {
        $assets = NetAssetValue::where('parent_id', 1)->get();

        $assets_display =
            $assets->groupBy('name')->map(function ($items, $key) {
                return [
                    'name' => $key,
                    'historicalData' => $items->map(function ($item) {
                        return [
                            'date' => $item->date,
                            'value' => $item->value,
                        ];
                    })->values()->toArray(),
                ];
            })->values()->toArray();

        return Inertia::render('NetAssetValue', [
            'assets' => $assets_display,
        ]);
    }
}
