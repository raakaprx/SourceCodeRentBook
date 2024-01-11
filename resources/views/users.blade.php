@extends('layouts.mainlayouts')

@section('title', 'User List')

@section('content')
    <h1>User List </h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="/users-banned" class="btn btn-secondary me-3"> View Banned User</a>
        <a href="/registered-users" class="btn btn-primary"> New Registered User</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ($item->phone)
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/users-detail/{{ $item->slug }}">Detail</a>
                            <a href="/users-banned/{{ $item->slug }}">Ban User</a>
                        </td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <td>{{ $loop->iteration }}</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
@endSection
