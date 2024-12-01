<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        return Inertia::render('Dashboard', [
            'stocks' => $stocks,
        ]);
    }
}
