@extends('layouts.mainlayouts')

@section('title', 'Dashboard')

@section('page-name', 'dashboard')

@section('content')
    <h1>Book List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="book-add" class="btn btn-primary me-3">Add New Book</a>
          <a href="book-deleted" class="btn btn-secondary">View Deleted Book</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Tittle</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            {{ $item->categories}}
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/book-edit/{{ $item->slug }}">Edit</a>
                            <a href="/book-delete/{{ $item->slug }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection
