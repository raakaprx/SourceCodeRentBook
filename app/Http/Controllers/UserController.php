<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\RentLogs;
use App\Models\Book;


class UserController extends Controller
{
    public function profile(){

      $rentlogs = RentLogs::with(['user', 'book'])->where('user_id',Auth::user()->id)->get();
       return view('profile',['rent_logs' => $rentlogs]);
    }

    public function index(){
        
      $users = User::where('role_id', 2)->where('status','active')->get(); //kecuali admin
      return view('users',['users'=>$users]);
     }
     
     public function registeredUser()
     {
       $registeredUser = User::where('status', 'NotActive')->where('role_id', 2)->get();
       return view('registered-user',['registeredUsers'=>$registeredUser]);
     }

     public function detail($slug)
    {
      $user = User::where('slug', $slug)->first();
      $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
      return view('user-detail',['user'=>$user,'rent_logs' => $rentlogs]);
      // // $rent_logs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
      // return view('user-detail',['user'=>$user, 'rent_logs' => $rent_logs]);
    }

    public function approve($slug)
    {
      $user = User::where('slug', $slug)->first();
      $user->status ='active';
      $user->save();

      return redirect('users-detail/'.$slug)->with('status', 'User Approved Sucessfully');
    }

    
    public function delete($slug)
    {
       $user = User::where('slug',$slug)->first();
       return view('user-delete',['user' => $user]);
    }

    public function destroy($slug)
    {
      $user = User::where('slug',$slug)->first();
      $user->delete();
      return redirect('users')->with('status', 'User Deleted Sucessfully');
    }

    public function bannedUser()
    {
       $bannedUsers =User::onlyTrashed()->get();
        return view('user-banned',['bannedUsers' => $bannedUsers]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug',$slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User Unbanned Sucessfully');
    }
}
