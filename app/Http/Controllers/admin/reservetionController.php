<?php

namespace App\Http\Controllers\admin;
use App\Models\Reservetion;

use App\Http\Controllers\Controller;
use App\Notifications\reservetionConfrimed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class reservetionController extends Controller
{
    public function index()
    {
        $Reservetions = Reservetion::all();
        return view('Reservetion.index', compact('Reservetions'));
    }

    public function status($id)
    {
        $Reservetions = Reservetion::find($id);
        $Reservetions->status = true;
        $Reservetions->save();

        Notification::route('mail',$Reservetions->email)->notify(new reservetionConfrimed());
        Alert::success('resevation cofrim successfully', 'Success Message');
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $Reservetion = Reservetion::find($id);
        $Reservetion->delete();
        Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }
    
}
