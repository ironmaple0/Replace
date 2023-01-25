<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Parking;

use App\Picture;

use App\Chat;

class DisplayController extends Controller
{
    public function index(){
        $parking = new Parking();
        $parkings = $parking->with('picture')->get();

        $user = Auth::user();

        //dd($parkings);

        $search = "地名を入力してください";
        return view('home',[
            'parkings' => $parkings,
            'search' => $search,
            'user' => $user,
        ]);
    }
    public function fillter(Request $request){
        $area = $request->input('search');
        $parking = new parking();
        $searchArea = $parking->where("address", "LIKE", "%$area%")->get();

        $user = Auth::user();

        return view('home',[
            'parkings' => $searchArea,
            'search' => $area,
            'user' => $user,
        ]);
    }

    public function parkingDetail(Parking $parking) {

        $user_id = Auth::id();

        $receiver_id = $parking['user_id'];

        $chat_id = Chat::where('sender_id',$user_id)
        ->where('receiver_id',$receiver_id)
        ->where('parking_id',$parking['id'])
        ->first('id');

        if($chat_id == NULL){
            $chat = new Chat();
            $chat->sender_id = $user_id;
            $chat->receiver_id = $receiver_id;
            $chat->parking_id = $parking['id'];
            $chat->save();
            $chat_id = $chat->id;
        }

        $owner_chat = Chat::where('receiver_id',$user_id)->get();

        return view('parking',[
            'parking' => $parking,
            'chat' => $chat_id,
            'user_id' => $user_id,
        ]);
    }
    
}
