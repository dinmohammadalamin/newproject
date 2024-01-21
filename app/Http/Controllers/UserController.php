<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;


class userController extends Controller
{

   
    public function showForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_numbers' => 'array',
            'emails' => 'array',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'thana' => 'nullable|string',
            'password' => 'required|string',
        ]);

        Employee::create($request->all());
        return response()->json(['message' => 'Form submitted successfully']);
    }
}