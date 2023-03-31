<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\slider;
use  App\Models\category;
use  App\Models\Item;
use  App\Models\Reservetion;
use  Brian2694\Toastr\Facades\Toastr;
use RealRashid\SweetAlert\Facades\Alert; 

class HomeController extends Controller
{
    public function index(){
        $sliders = slider::all();
        $category = category::all();
        $item = Item::all();
        return view('welcome', compact('sliders','category','item'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'person' => 'required'
        ]);

        $reservation = new Reservetion();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->person = $request->person;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        Alert::success('Data insert Success', 'Success Message');

        Toastr::success('reservetion request sent successfully. We will confrim you soon', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}

