<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InvitationController extends Controller
{
    public function create($token) {
        $user = User::where('invitation_token', $token)->firstOrFail();

        return view('auth.invitation', compact('user'));
    }

    public function store($token) {
        $user = User::where('invitation_token', $token)->firstOrFail();

        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'password' => Hash::make($data['password']),
            'invitation_token' => '',
            'active' => 1,
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $data['password']])) {
            return redirect('dashboard');
        }
    }
}
