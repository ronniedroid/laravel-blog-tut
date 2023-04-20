<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        try {
            $newsletter->subscript(request('email'));
        } catch (\Exception $execption) {
            throw ValidationException::withMessages([
                'email' => 'your email address could not be added to the newletter'
            ]);
        }

        return redirect('/')->with('success', 'you are now subscribed to out newsletter');
    }
}
