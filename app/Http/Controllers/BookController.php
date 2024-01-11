<?php

namespace App\Http\Controllers;

use App\Models\book; // Nama model dengan huruf kapital
use App\Models\Book_category;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;

class BookController extends Controller
{
    public function index()
    {
        $books = book::orderBy('id', 'desc')->get(); // Eksekusi query dengan tanda kurung
        return view('books', ['book' => $books]);
    }

    public function add()
    {   
        $categories = categories::all();
        return view('book-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        // 'book_code' => 'required|unique:categories|max:255',
        // 'title' => 'required|unique:categories|max:255',
        // ]); 
        
        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'.'.now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover',$newName);
        }

        $request['cover'] = $newName; 
        $book = book::create($request->all()); // Variable singular untuk objek model
        // Book_category::create([
        //     'book_id' => $book->id,
        //     'category_id' => $request->categories
        // ]);
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Buku berhasil ditambahkan!');
    }

    public function edit($slug){
        $book = book::where('slug', $slug)->first();
        $categories = categories::all();
        return view ('book-edit', ['categories' => $categories, 'book' => $book]);
    }

    public function update(Request $request, $slug)
    {
        
        $book = Book::where('slug',$slug)->first();
        // $book->update($request->all());

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'.'.now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover',$newName);
            $request['cover'] = $newName; 

            $book->update([
                'book_code' => $request->book_code,
                'title' => $request->title,
                'description' => $request->description,
                'cover' => $newName,
                'status' => $request->status,
                'categories' => $request->categories
            ]);
        }else{
            $book->update([
                'book_code' => $request->book_code,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'categories' => $request->categories
            ]);
        }

        

        if($request->category){
            $book->category()->sync($request->categories);
         }

        return redirect('books')->with('status', 'Books Updated Sucessfully');
    } 

    public function delete($slug)
    {
        $book = Book::where('slug',$slug)->first();
        return view('book-delete',['book' => $book]);
    }

    public function destroy($slug)
    {
        $book = Book::where('slug',$slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Deleted Sucessfully');
    }

    public function deletedBook()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('book-deleted-list',['deletedBooks' => $deletedBooks]);
    }

    public function restore($slug)
    {
        $Books = Book::withTrashed()->where('slug',$slug)->first();
        $Books->restore();
        return redirect('books')->with('status', 'Category Restored Sucessfully');
    }   
}