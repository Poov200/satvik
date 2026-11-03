<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class OfferApiController extends Controller
{
    public function comboPage()
    {
        return view('combo-offers');
    }

    public function specialPage()
    {
        return view('special-offers');
    }

    public function index(string $type)
    {
        abort_unless(in_array($type, ['combo', 'special'], true), 404);

        $offers = Offer::available()
            ->where('type', $type)
            ->orderBy('ends_at')
            ->get();

        return response()->json($offers);
    }
}