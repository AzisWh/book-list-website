<?php

namespace App\Http\Controllers;

use App\Models\BookCat;
use Illuminate\Http\Request;

class KatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BookCat::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        BookCat::create($input);
        return redirect()->route('categories.index')->with('success', 'Menambah Kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCat $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCat $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCat $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Kategori Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCat $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori Terhapus');
    }
}
