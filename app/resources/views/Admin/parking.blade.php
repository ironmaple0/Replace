@extends('layouts.layout')
@section('content')

    <div class="detail_container">
        <div class="detail_upper">
            <img class="detail_img" src="{{ asset($parking->picture['picture_url']) }}"　>
            <div class="detail_contents1">
             <p class="detail_p">Pナンバー:{{ $parking['id'] }}</p>
             <p class="detail_p">住所:{{ $parking['address'] }}</p>
             <p class="detail_p">台数:{{ $parking['number'] }}</p>
            </div>
            <div class="detail_contents2">
             <p class="detail_p">サイズ:{{ $parking['size'] }}</p>
             @if($parking['status'] == 0)
             <p class="detail_p">ステータス:空き</p>
             @else
             <p class="detail_p">ステータス:貸出中</p>
             @endif
            </div>
            <div class="detail_contents3">
                <p class="detail_p">{{ $parking['Start_date'] }}　から　{{ $parking['term'] }}</p>
            </div>
        </div>
        <div class="detail_middle">
        <p class="detail_m_p">メモ</p><br>
        <p class="detail_m_p2">{{ $parking['memo'] }}</p>
        </div>
@endsection
