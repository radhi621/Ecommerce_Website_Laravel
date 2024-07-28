<?php

namespace App\Http\Controllers;

use App\Models\Contact; // Assuming you have a Contact model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|max:255',
        'message' => 'required',
    ]);

    Contact::create($validatedData);

    return redirect()->route('contact')->with('success', 'Contact saved successfully.');
}


}

