<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(){
        return view('carBooking.bookCar');
    }

    public function track(){
        $bookedCars = Car::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('carBooking.carbookingHistory',compact('bookedCars'));
    }

    public function processService(Request $request){
        $carHire =  $request->validate([
            'car_model' => 'required',
            'car_duration' => 'required',
            'car_mode_payment' => 'required',
            'phone_number' => 'required',
         ]);

        
            $car =  new Car();
            $car->user_id = Auth::user()->id;
            $car->model = $request->car_model;
            $car->mode_of_payment = $request->car_mode_payment;
            $car->phone_number = $request->phone_number;
            $car->number_of_days = $request->car_duration;
            $car->status = 1;

            if($request->car_model === 'bmw'){
                $car->charge = 2000 * $request->car_duration; 
            }
            elseif($request->car_model === 'mercedes'){
                $car->charge = 3000 * $request->car_duration;
            }
            elseif($request->car_model === 'mazda'){
                $car->charge = 1500 * $request->car_duration;
            }
            elseif($request->car_model === 'toyota'){
                $car->charge = 1000 * $request->car_duration;
            }else{
                $car->charge = 2500 * $request->car_duration;
            }

            $car->save();
            return redirect()->route('user.track.progress')->with('success', ucwords($request->car_model).' booked successfuly');

    }

    public function showBookedCars(){
        if(Auth::user()->hasRole('admin')){
            $bookedCars = Car::where('user_id', Auth::user()->id)->latest()->paginate(5);
            return view('adminDashboard',compact($bookedCars));
        }else{
            return abort(401, 'You are not authorized');
        }
    }

    public function rejectBookedCar($id){
        $car_rejected = Car::findOrFail($id);
        $car_rejected->status = 0;
        $car_rejected->save();
        return redirect()->route('dashboard')->with('error','Booking service rejected');
    }

    public function approveBookedCar($id){
        $car_rejected = Car::findOrFail($id);
        $car_rejected->status = 2;
        $car_rejected->save();
        return redirect()->route('dashboard')->with('message','Booking service approved successfully');
    }

    public function deleteBookedCar($id){
        $car_rejected = Car::findOrFail($id);
        $car_rejected->delete();
        return redirect()->route('dashboard')->with('error','Booking service request deleted');
    }

    
}
