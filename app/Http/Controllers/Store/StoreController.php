<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('store.index');
    }

    public function create() {
        return view('store.create');
    }

    public function store() {
        $data = \request()->validate([
            'name'=> 'required',
            'logo' => 'image'
        ]);

        $imagePath = \request('logo')->store('uploads', 'public');

        Auth()->user()->family->stores()->create([
            'name' => $data['name'],
            'logo' => $imagePath
        ]);

        return redirect('dashboard');
    }

    public function edit(Store $store) {
        return view('store.edit', compact('store'));
    }

    public function update(Store $store) {
        $data = \request()->validate([
            'name'=> 'required',
            'logo' => 'image'
        ]);

        $imagePath = \request('logo')->store('uploads', 'public');

        $store->update([
            'name' => $data['name'],
            'logo' => $imagePath
        ]);

        return redirect('store.show', ['store' => $store->id]);
    }

    public function show(Store $store) {
        return view('store.show', compact('store'));
    }
}
