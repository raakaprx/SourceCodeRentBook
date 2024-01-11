@extends('layouts.mainlayouts')

@section('title', 'Edit Book')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Edit Book</h1>

    <div class="mt-5 w-50">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/book-edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Book's Code" value="{{$book->book_code}}">
              <div class ="mt-3">
                <label for="title" class="form-label">Tittle</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book's Tittle" value="{{$book->title}}">
              </div>
              <div class ="mt-3">
                <label for="Image" class="form-label">Image</label>
                <input type="file" name="image" value="{{$book->cover}}" class="form-control">
              </div>

              <div class="mb-3">
                <label for="CurrentImage" class="form-label" style="display:block">Current Image</label>
                <div>
                @if ($book->cover!='')
                    <img src="{{asset('storage/cover/'.$book->cover)}}" alt="" width="100px">                        
                    @else
                    <img src="{{asset('image/th.jpeg')}}" alt="" width="100px">       
                @endif
                </div>
              </div>
            

                <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories" id="category" class="form-control select-multiple">
                    <option value="{{$book->categories}}" selected>{{$book->categories}}</option>
                    @foreach ($categories as $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
                </div>

                <div class="mb-3">
                    <label for="currentCategory" class="form-label">Current Category</label>
                    <ul>
                        {{-- @foreach ($book->categories as $category)
                            <li>{{$category->name}}</li>
                        @endforeach --}}
                    </ul>
                </div>
                <div>
                    <button class="btn btn-primary mt-3" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
          $(document).ready(function() {
        $('.select-multiple').select2();
    });
    </script>
@endSection
