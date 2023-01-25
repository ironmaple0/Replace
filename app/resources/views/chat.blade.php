@extends('layouts.layout')
@section('content')
<div class="chat-container">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">{{ $chat['id'] }}</div>
            <div class="card-body chat-card">
 
            <div id="comment-data"></div>

            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('add', ['chat' => $chat]) }}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="comment" placeholder="Shift＋Enterで送信"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">送信</button>
        </div>
    </div>
</form>
@endsection

@section('js')
<script src="{{ asset('js/comment.js') }}"></script>
@endsection