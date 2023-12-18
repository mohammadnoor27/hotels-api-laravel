<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Get a list of hotels with images.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $hotels = Hotel::with('images')->get();

        return response()->json(['hotels' => $hotels], 200);
    }
}
