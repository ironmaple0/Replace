<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Parking;

use App\Picture;

use App\Chat;

use App\User;

class DisplayController extends Controller
{
    public function index(){
        $parking = new Parking();
        $parkings = $parking->with(['picture','user'])->get();

        $user = Auth::user();

        //dd($parkings);

        $search = "地名を入力してください";
        return view('Admin/home',[
            'parkings' => $parkings,
            'search' => $search,
            'user' => $user,
        ]);
    }

    public function fillter(Request $request){
        $area = $request->input('search');
        $parking = new parking();
        $searchArea = $parking->where("address", "LIKE", "%$area%")->get();
        return view('admin.home',[
            'parkings' => $searchArea,
            'search' => $area,
        ]);
    }

    public function userDetail(int $user_id) {

        $oneUser = User::find($user_id);

        return view('Admin/user',[
            'user' => $oneUser,
        ]);
    }

    public function parkingDetail(int $id) {

        $oneParking = Parking::find($id);

        return view('Admin/parking',[
            'parking' => $oneParking,
        ]);
    }
    
}
