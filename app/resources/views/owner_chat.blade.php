@extends('layouts.layout')
@section('content')
<div class="owner_index">
     <table class='table'>
       <thead>
         <tr>
           <th scope='col'>相手のID</th>
           <th scope='col'>Pナンバー</th>
           <th scope='col'>Chat部屋</th>
          </tr>
       </thead>
       <tbody>
          @foreach($owner_chats as $owner_chat)
          @if(!($owner_chat['sender_id'] == $owner_chat['receiver_id']))
          <tr>
              <th scope='col'>{{ $owner_chat['sender_id'] }}&nbsp;
              <span class="click1"><a href="{{ route('start.parking', ['parking' => $parking['id']]) }}">に貸す</a></span>
              </th>
              <th scope='col'>{{ $owner_chat['parking_id'] }}</th>
              <th scope='col'>
                  <a href="{{ route('chat', ['chat' => $owner_chat['id']]) }}">{{ $owner_chat['id'] }}</a>
              </th>
          </tr>
          @endif
          @endforeach
       </tbody>
     </table>   
   </div>   
 </div>
@endsection
