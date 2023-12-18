<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Login user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return response()->json(['user' => $user], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Register a new user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'firstName' => 'required|string',
            'middleName' => 'string',
            'lastName' => 'required|string',
            'role' => 'in:admin,user',
            'profileImage' => 'string',
            'phoneNumber' => 'string',
            'occupation' => 'string',
            'nationality' => 'string',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'role' => $request->role ?? 'user',
            'profileImage' => $request->profileImage,
            'phoneNumber' => $request->phoneNumber,
            'occupation' => $request->occupation,
            'nationality' => $request->nationality,
            // Add other fields as needed
        ]);

        return response()->json(['user' => $user], 201);
    }
}
