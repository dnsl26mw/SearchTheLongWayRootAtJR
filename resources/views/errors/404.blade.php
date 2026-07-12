@php
    $pagetitle = 'ページが見つかりません'; 
@endphp

@extends('layouts.app')

@section('title', $pagetitle)

@section('content')

    <h2 class="page-title">{{ $pagetitle }}</h2>

    <p>
        お探しのページは見つかりませんでした。<br>
        URLをもう一度お確かめください。
    </p>

    <div class="action-area">
        <a href="{{ route('top')}}">トップへ戻る</a>
    </div>

@endsection