<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use App\Parking;

use App\Chat;

use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function owner_index(Parking $parking){

        $user_id = Auth::id();

        $owner_chat = Chat::where('receiver_id',$user_id)->get();

        return view('owner_chat',[
            'owner_chats' => $owner_chat,
            'parking' => $parking,
        ]);
    }
    
    public function index(Chat $chat){
        $contents = Comment::where('chat_id',$chat['id'])->get();
        return view('chat', 
        [
         'comments' => $contents,
         'chat' => $chat,
        ]);
    }

    public function add(Request $request){
        $content = $request->input('comment');
        $chat_id = $request->chat;

        $comment = new Comment();
        $comment->content = $content;
        $comment->chat_id = $chat_id;
        $comment->save();

        $contents = Comment::where('chat_id',$chat_id)->get();

        return redirect()->route('chat',['chat' => $chat_id])->with([
            'comments' => $contents,
            'chat_id' => $chat_id,
        ]);
    }    

        public function getData(Request $request){
            $chat_id = $request->chat_id;
            $comments = Comment::where('chat_id',$chat_id)->orderBy('created_at', 'desc')->get();
            $json = ["comments" => $comments];
            return response()->json($json);
        }
    
    

}