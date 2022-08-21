<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if(Auth::user()->hasRole('user')){
           return view('userDashboard', compact('user'));
        }elseif(Auth::user()->hasRole('admin')){
            $bookedCars = Car::latest()->paginate(5);
            return view('adminDashboard', compact('user','bookedCars'));
        }else{
            return response()->json('You are not authorized');
        }
       
    }
}
