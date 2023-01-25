<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;

use Illuminate\Support\Facades\Auth;

use App\Parking;

use App\Picture;

use App\Chat;

use App\Comment;

class RegistrationController extends Controller
{
    public function createParking(CreateData $request) {

        $dir = 'pictures';

        $file_name = $request->file('picture')->getClientOriginalName();
        $request->file('picture')->storeAs('public/' . $dir, $file_name);
        
        $picture = new Picture();
        $picture->picture_name = $file_name;
        $picture->picture_url = 'storage/' . $dir . '/' . $file_name;
        $picture->save();

        $picture_id = $picture->id;
        
        $parking = new Parking();
        $id = Auth::id();

        $parking->user_id = $id;
        $parking->address = $request->address;
        $parking->number = $request->number;
        $parking->size = $request->size;
        $parking->term = $request->term;
        $parking->Start_date = $request->Start_date;
        $parking->picture_id = $picture_id;
        $parking->memo = $request->memo;
        $parking->status = 0;
        $parking->partner_id = null;

        $parking->save();

        return redirect()->route('index');
    }

    public function editForm(Parking $parking) {


        return view('edit_form',[
            'params' => $parking,
        ]);
    }

    public function editParking(Parking $parking, CreateData $request) {

        $parking->term = $request->term;
        $parking->Start_date = $request->Start_date;
        $parking->memo = $request->memo;

        $parking->save();

        return redirect()->route('parking.detail', [
            'parking' => $parking['id'],
        ]);
    }

    public function startForm(Parking $parking) {

        $user_id = Auth::id();

        $owner_chat = Chat::where('receiver_id',$user_id)->first();

        return view('start_form',[
            'parking' => $parking,
            'owner_chat' => $owner_chat,
        ]);
    }

    public function startParking(Parking $parking, Request $request) {

        $parking->partner_id = $request->partner_id;

        $parking->status = 1;

        $parking->save();

        return redirect()->route('parking.detail', [
            'parking' => $parking['id'],
        ]);
    }
}