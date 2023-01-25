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
    <div class="form_container">
        <form action="{{ route('create.parking') }}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="create_form">
                <label>住所</label><input type="text" name="address" value="{{ old('address') }}"><br>
                <label>台数</label><input type="text" name="number" value="{{ old('number') }}"><br>
                <label>サイズ</label><input type="text" name="size" value="{{ old('size') }}"><br>
                <label>期間</label><input type="text" name="term" value="{{ old('term') }}"><br>
                <label>開始日</label><input type="date" name="Start_date" value="{{ old('Start_date') }}"><br>
                <label>写真</label><input type="file" name="picture"><br>
                <label>メモ</label><textarea name="memo">{{ old('memo') }}</textarea><br>
                <input type="submit" value="登録" class="create_submit">
            </div>
        </form> 
    </div>
@endsection