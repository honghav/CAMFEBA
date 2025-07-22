<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $currentUser = Auth::user();

        return view('auth.register', compact('currentUser'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function handleProfileUpload($image): string
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        return $image->storeAs('profiles', $filename, 'public');
    }

    public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'string'],
        'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
    ]);

    $profilePath = null;
    try {
        if ($request->hasFile('profile')) {
            $profilePath = $this->handleProfileUpload($request->file('profile'));
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'member',
            'profile' => $profilePath,
        ]);

        event(new Registered($user));
        // Auth::login($user);

        return redirect()->route('table.index')->with('success', 'User registered successfully');

    } catch (\Exception $e) {
        // Clean up uploaded file if user creation fails
        if ($profilePath && Storage::disk('public')->exists($profilePath)) {
            Storage::disk('public')->delete($profilePath);
        }

        return back()
            ->withInput()
            ->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
    }
}

}
