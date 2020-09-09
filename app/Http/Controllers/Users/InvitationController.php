<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('users.create');
    }

    public function store() {
        $data = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        User::create([
            'email' => $data['email'],
            'invitation_token' => Uuid::uuid4(),
            'password' => Uuid::uuid4(),
            'family_id' => Auth::user()->family->id
        ]);

        return redirect('dashboard');
    }
}
