<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;      // Admin & Teacher
use App\Models\Student;   // Student
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the logged-in user's profile
     */
    public function index()
    {
        $user = Auth::user(); // logged-in user

        // Check role
        if ($user->role === 'student') {
            $profile = Student::with('course')->where('user_id', $user->id)->first();
        } else {
            // admin or teacher
            $profile = $user;
        }

        return view('backend.profiles.index', compact('profile'));
    }

    /**
     * Admin viewing any user profile (optional)
     */
    public function show($id)
    {
        $profile = User::findOrFail($id);

        // If student, fetch student details
        if ($profile->role === 'student') {
            $profile = Student::with('course')->where('user_id', $profile->id)->first();
        }

        return view('backend.profile.show', compact('profile'));
    }

    /**
     * Update profile (optional)
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'student') {
            $profile = Student::where('user_id', $user->id)->first();
        } else {
            $profile = $user;
        }

        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:255',
            'photo'      => 'nullable|image|max:2048',
        ]);

        // Update basic info
        $profile->first_name = $request->first_name ?? $profile->first_name;
        $profile->last_name  = $request->last_name ?? $profile->last_name;
        $profile->email      = $request->email ?? $profile->email;
        $profile->phone      = $request->phone ?? $profile->phone;
        $profile->address    = $request->address ?? $profile->address;

        // Upload profile image if exists
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profiles', 'public');
            $profile->photo = $path;
        }

        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
