<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSignup;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_signups,email',
        ]);

        NewsletterSignup::create([
            'user_id' => Auth::id(),
            'email' => $request->email,
        ]);

        return back()->with('success', 'You have successfully signed up for the newsletter!');
    }
}


