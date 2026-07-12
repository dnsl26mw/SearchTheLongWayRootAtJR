@php
    $pagetitle = 'システムに接続できません'; 
@endphp

@extends('layouts.app')

@section('title', $pagetitle)

@section('content')

    <h2 class="page-title">{{ $pagetitle }}</h2>

    <p>
        現在システムに接続できません。<br>
        時間をおいてからもう一度お試しください。
    </p>

    <div class="action-area">
        <a href="{{ route('top')}}">トップへ戻る</a>
    </div>

@endsection