<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('category.index');
    }

    public function create() {
        return view('category.create');
    }

    public function store() {
        $data = \request()->validate([
            'category'=> 'required',
        ]);

        Auth()->user()->family->categories()->create([
            'category' => $data['category'],
        ]);

        return redirect('dashboard');
    }

    public function edit(Category $category) {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category) {
        $data = \request()->validate([
            'name'=> 'required',
        ]);

        $category->update([
            'name' => $data['name'],
        ]);

        return redirect('category.show', ['category' => $category->id]);
    }

    public function show(Category $category) {
        return view('category.show', compact('category'));
    }
}
