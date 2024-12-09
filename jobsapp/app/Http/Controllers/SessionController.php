<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login'); // Return the login view
    }

    public function store(Request $request)
    {
        // Step 1: Validate form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Step 2: Check if the user is rate-limited (before attempting to log in)
        $this->ensureIsNotRateLimited($request);

        // Step 3: Attempt to log in the user
        if (Auth::attempt($credentials)) {
            // Step 4: Regenerate session token for security
            $request->session()->regenerate();

            // Step 5: Clear the rate limiter after a successful login
            RateLimiter::clear($this->throttleKey($request));

            // Step 6: Redirect the user to their intended destination or /jobs
            return redirect()->intended('/jobs')->with('success', 'Welcome back!');
        }

        // Step 7: If login fails, increase failed attempt count and show error
        RateLimiter::hit($this->throttleKey($request));

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Ensure the user is not rate-limited for failed login attempts.
     */
    protected function ensureIsNotRateLimited(Request $request)
    {
        // Check if the user has exceeded the allowed number of failed login attempts (e.g., 10)
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 10)) {
            // Get the number of seconds remaining before the user can try again
            $seconds = RateLimiter::availableIn($this->throttleKey($request));

            // Dynamically include the wait time in the error message
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Too many login attempts. Please try again in ' . $seconds . ' seconds.']
            ]);
        }
    }

    /**
     * Generate a unique throttle key for the rate limiter.
     */
    protected function throttleKey(Request $request)
    {
        return 'login:' . $request->ip(); // You can use the user's IP or email for a more granular throttle key
    }

    /**
     * Log the user out of the system.
     */
    public function destroy(Request $request)
    {
        Auth::logout(); // Log out the authenticated user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the session token to prevent CSRF attacks

        return redirect('/')->with('success', 'You have been logged out successfully.'); // Redirect to the homepage
    }
}
