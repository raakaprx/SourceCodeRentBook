@extends('layouts.mainlayouts')

@section('title', 'Dashboard')

@section('page-name','dashboard')

@section('content')

    <h1>Welcome, {{Auth::user()->username}}</h1>

    <div class="row mt-5">
        <div class="col-lg-4 ">
            <div class="card-data books">
                <div class="row">
                    <div class="col-lg-6"><i class="bi bi-journal-text"></i></div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">BOOKS</div>
                        <div class="card-count">{{$book_Count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card-data categories">
                <div class="row">
                    <div class="col-lg-6"><i class="bi bi-list-task"></i></div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">CATEGORIES</div>
                        <div class="card-count">{{$category_Count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card-data users">
                <div class="row">
                    <div class="col-lg-6"><i class="bi bi-person-arms-up"></i></div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">USERS</div>
                        <div class="card-count">{{$user_Count}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2>Rent Logs User</h2>
        <x-rent-log-table :rentlog='$rent_logs'/>
    </div>  
@endSection
