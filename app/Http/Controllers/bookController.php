<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
        // dd($books);
        return view ('books.index', compact('books'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }
        // dd($imageName);
        Book::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'image' => $imageName,
        ]);

        return redirect()->route('books.index')->with('success', 'Book Name created successfully!');
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
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
         //validate new input
         $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
         
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }
        //create a new BookName in the db
        
            $book->update([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'image' => $imageName,
        ]);
        
        //     $book->update($request->all());
        //    'name' => $request->input('name');
        //    'detail' => $request->input('detail');
        //    'image' => $imageName,
           

        //redirect the user and send friendly message
        return redirect()->route('books.index')->with('success', 'Book Name/Details Updated Successfully!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //delete the book
        $book->delete();

        //redirect the user and display success message
        return redirect()->route('books.index')->with('success', 'Book Name/Details Deleted Successfully!');   
    } 
}
