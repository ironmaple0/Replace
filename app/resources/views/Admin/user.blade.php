@extends('layouts.layout')
@section('content')


    <div class="syousai_container">
        <div class="detailUpper">
            <p>名前:{{ $user['name'] }}</p>
            <p>電話番号:{{ $user['phonenumber'] }}</p>
            <p>メールアドレス:{{ $user['email'] }}</p>
        </div>
    </div>
@endsection

