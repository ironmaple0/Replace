@extends('layouts.layout_admin')
@section('content')

 <div class="home_container">
   <div class="ad_index_upper">
     <p>parking一覧</p>

   <div class="admin_index">
     <table class='table'>
       <thead>
         <tr>
           <th scope='col'>名前</th>
           <th scope='col'>Pナンバー</th>
           <th scope='col'>住所</th>
           <th scope='col'>作成日時</th>
           <th scope='col'>ステータス</th>
          </tr>
       </thead>
       <tbody>
          @foreach($parkings as $parking)
          <tr>
            <th scope='col'>
              <a href="{{ route('user.detail', ['user_id' => $parking->user['id']]) }}">{{ $parking->user['name'] }}</a>
            </th>
            <th scope='col'>
              <a href="{{ route('admin.parking.detail', ['id' => $parking['id']]) }}">{{ $parking['id'] }}</a>
            </th>
            <th scope='col'>{{ $parking['address'] }}</th>
            <th scope='col'>{{ $parking['created_at'] }}</th>
            @if($parking['status'] == 0)
            <th scope='col'>空き</th>
            @else
            <th scope='col'>貸出中</th>
            @endif
          </tr>
          @endforeach
       </tbody>
     </table>   
   </div>   
 </div>
@endsection
