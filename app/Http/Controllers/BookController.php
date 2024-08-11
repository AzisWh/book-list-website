<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCat;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //filter
        $category_id = $request->input('category_id');
        $search = $request->input('search');
        $publication_date = $request->input('publication_date');

        $query = Book::with('bookcat');

        //Filter List Books by Categories
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        //Filter List Books by text that will search for Title, Author and Publisher
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('publisher', 'like', "%{$search}%");
            });
        }

        //Filter List Books by Publication Date
        if ($publication_date) {
            $query->whereDate('publication_date', $publication_date);
        }

        //get query results
        $books = $query->get(); 

        $categories = BookCat::all();
        return view('books.index', compact('books','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BookCat::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_date' => 'required|date',
            'category_id' => 'required',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = BookCat::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_date' => 'required|date',
            'category_id' => 'required',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
