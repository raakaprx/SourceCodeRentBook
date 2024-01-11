<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\categories;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = categories::all();

        if ($request->category || $request->title) { //pencarian dengan category dan title
            //    $books = Book::where('title','like', '%'.$request->title.'%')->get();
            $books = Book::where('title', 'like', '%' . $request->title . '%')
                ->orWhereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category);
                })->orderBy('id', 'desc')->
                get();
        } else {
            $books = Book::orderBy('id', 'desc')->get();
        };
        return view('book-list', ['books' => $books, 'categories' => $categories]);
    }
}
