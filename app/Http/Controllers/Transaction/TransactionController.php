<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Store;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('transaction.index');
    }

    public function create() {
        $user = Auth::user();
        return view('transaction.create', compact('user'));
    }

    public function store() {
        $user = Auth::user();
        $data = \request()->validate([
            'bedrag'=> 'required|numeric',
            'datum' => 'date|required',
            'store'=> 'required',
            'category' => 'required',
            'omschrijving' => ''
        ]);

        Transaction::create([
            'bedrag' => $data['bedrag'],
            'datum' => $data['datum'],
            'store_id' => $data['store'],
            'category_id' => $data['category'],
            'omschrijving' => $data['bedrag'],
            'user_id' => $user->id,
            'family_id' => $user->family->id,
            'eenmalig' => 1
        ]);

        return redirect('dashboard');
    }

    public function edit(Transaction $transaction) {
        return view('transaction.edit', compact('transaction'));
    }

    public function update(Transaction $transaction) {
        $data = \request()->validate([
            'name'=> 'required',
            'logo' => 'image'
        ]);

        $imagePath = \request('logo')->store('uploads', 'public');

        $transaction->update([
            'name' => $data['name'],
            'logo' => $imagePath
        ]);

        return redirect('transaction.show', ['transaction' => $transaction->id]);
    }

    public function show(Transaction $transaction) {
        return view('transaction.show', compact('transaction'));
    }
}
