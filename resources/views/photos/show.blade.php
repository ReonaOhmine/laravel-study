@extends('layouts.default')

@section('title', 'アップロード画像の表示')
@section('content')

@if(session()->has('success'))
    <p>{{ session()->get('success') }}</p>
@endif

<img src="{{ asset('storage/photo/' . $filename) }}" alt="Uploaded Image">

<form action="{{ route('photos.destroy', $filename) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">削除</button>
</form>

<a href="{{ route('photos.download', ['photo' => $filename]) }}">ダウンロード</a>

@endsection
