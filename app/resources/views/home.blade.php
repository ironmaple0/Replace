@extends('layouts.layout')
@section('content')

 <div class="home_container">

   <div class="home_search">
     <form action="search" method="POST">　
     @csrf
     <input type="search" name="search" class="search_box" placeholder="{{ $search }}">
     <input type="submit" name="submit" class="submit_box" value="検索">
     </form>
   </div>
   
   @if($user['role'] == 1)
    <div class="insert">
      <a href="{{ route('create.parking') }}">
        <button type='button' class="create_go">貸出登録する</button>
      </a>  
    </div>
    @endif 

   <div class="index">
      @foreach($parkings as $parking) 
      <div class="box">
      <a href="{{ route('parking.detail', ['parking' => $parking['id']]) }}">
      <img class="index_img" src="{{ asset($parking->picture['picture_url']) }}">
      <table class>
        <tr>
         <th>場所</th><td>{{ $parking->address }}</td>
        </tr>
        <tr>
         <th>開始日</th><td>{{ $parking->Start_date }}</td>
        </tr>
        <tr>
         <th>期間</th><td>{{ $parking->term }}</td>
        </tr>
        <tr>
         <th>サイズ</th><td>{{ $parking->size }}</td>
        </tr>
        <tr>
          @if($parking['status'] == 0)
          <th>ステータス</th><td>空き</td>
          @else
          <th>ステータス</th><td>貸出中</td>
        </tr>
          @endif
      </table>   
     </a>
    </div> 
     @endforeach
   </div>
 </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.1.0/jquery.infinitescroll.min.js"></script>
<script src="{{  asset(js/scroll.js)" ></script>
@endsection
