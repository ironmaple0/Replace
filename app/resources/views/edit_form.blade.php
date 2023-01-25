@extends('layouts.layout')
@section('content')

@if($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="editform_container">
        <form action="{{ route('edit.parking', ['parking' => $params['id']]) }}" method="post">
            @csrf 
            <img class="edit_img" src="{{ asset($params->picture['picture_url']) }}"　>
            <div class="edit_form">
             <label>住所</label>
                <input type="text" name="address" value="{{ $params['address'] }}" readonly><br>
             <label>台数</label>
                <input type="text" name="number" value="{{ $params['number'] }}" readonly><br>
             <label>サイズ</label>
                <input type="text" name="size" value="{{ $params['size'] }}" readonly><br>
             <label>期間</label>
                <input type="text" name="term" value="{{ $params['term'] }}"><br>
             <label>開始日</label>
                <input type="date" name="Start_date" value="{{ $params['Start_date'] }}"><br>
             <label>メモ</label>
                <textarea name="memo"> {{ $params['memo'] }} </textarea><br>
             <input type="submit" value="変更する" class="edit_submit">
            </div>
        </form> 
    </div>
@endsection