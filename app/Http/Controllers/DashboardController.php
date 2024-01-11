<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\book;
use App\Models\categories;
use App\Models\Category;
use App\Models\User;
use App\Models\RentLogs;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = book::count();
        $categoryCount = categories::count();
        $userCount = User::count();
        $rent_logs = RentLogs::with(['user','book'])->get();
        return view('dashboard',['book_Count' => $bookCount, 'category_Count' => $categoryCount, 'user_Count' => $userCount, 'rent_logs' => $rent_logs]);
    }
}
