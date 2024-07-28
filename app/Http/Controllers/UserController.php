<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function storeDeviceToken(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'token' => 'required|string' // Assuming the token is sent as 'token' in the request
        ]);

        // Get the authenticated user
        $user = auth()->user();
        // $user->device_token = $validatedData['token'];
        // $user->save();
        // Update the user's device_token column with the received token
        $user->update(['device_token' => $validatedData['token']]);

        return response()->json(['message' => 'Device token stored successfully'], 200);
    }
}
