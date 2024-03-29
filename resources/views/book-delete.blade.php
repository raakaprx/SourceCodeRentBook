@extends('layouts.mainlayouts')

@section('title', 'Delete Book')


@section('content')
   <h2> Are you sure you want to delete this book? {{ $book->title }}</h2>
   <div class="mt-3"> 
    <a href="/book-destroy/{{ $book->slug }}" class="btn btn-danger"> Sure</a>
    <a href="/books" class="btn btn-info"> Cancel</a>
   </div>
@endsection