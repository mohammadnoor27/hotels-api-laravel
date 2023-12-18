<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Get the authenticated user's favorite hotels.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postFavorite()
    {
        $user = Auth::user();
        $favoriteHotels = $user->favorites;

        return response()->json(['favoriteHotels' => $favoriteHotels], 200);
    }

    /**
     * Get the authenticated user's data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $user = Auth::user();

        return response()->json(['user' => $user], 200);
    }

    /**
     * Update user data.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'string',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'min:6',
            'firstName' => 'string',
            'middleName' => 'string',
            'lastName' => 'string',
            'role' => 'in:admin,user',
            'profileImage' => 'string',
            'phoneNumber' => 'string',
            'occupation' => 'string',
            'nationality' => 'string'
        ]);

        $user->update($request->all());

        return response()->json(['user' => $user], 200);
    }
}
