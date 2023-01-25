@extends('layouts.layout')
@section('content')
    <div class="form_container">
        <form action="{{ route('start.parking', ['parking' => $parking['id']]) }}" method="post">
            @csrf 
            <div class="partner">
                <label>貸す相手<input type="text" name="partner_id" value="{{ $owner_chat['sender_id'] }}"></label><br>
                <input type="submit" value="サービス開始する" class="start_submit">
            </div>
        </form> 
    </div>
@endsection