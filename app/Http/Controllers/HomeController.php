<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $userId = Auth::id();
        $user = User::find($userId);




        return view('account')->with( 'user', $user);
    }

    public function instructor()
    {
        return view('instructor');
    }

    public function zwischenspeicher()
    {
        return view('zwischenspeicherblade');
    }

}
