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
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:' . User::class,
            'tel' => 'sometimes|string|max:255|unique:users,mobile',
            'profile' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'gender' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $profile = "";
        if ($request->file("profile")) {
            $request->file("profile")->store("profiles");
            # code...
        }
        $user = User::create([
            'uuid' => Str::uuid(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'usernmae' => $request->usernmae,
            'gender' => $request->gender ?? "",
            'profile' => $profile ?? "",
            'email' => $request->email ?? "",
            'mobile' => $request->tel ?? Str::uuid(),
            'password' => Hash::make($request->password),
            'relationship' => "single"
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
