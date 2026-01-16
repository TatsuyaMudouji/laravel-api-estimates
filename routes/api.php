<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/estimates', function (Request $request) {
    $validated = $request->validate([
        'area' => ['required', 'numeric', 'gt:0'],
        'unit_price' => ['required', 'numeric', 'gt:0'],
    ]);

    $area = (float) $validated['area'];
    $unitPrice = (float) $validated['unit_price'];
    $total = (int) round($area * $unitPrice);

    return response()->json([
        'area' => $area,
        'unit_price' => $unitPrice,
        'total' => $total,
    ]);
});
