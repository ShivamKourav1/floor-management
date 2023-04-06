@extends('layouts.app')
@section('uname')
{{ Session::get('uname') }}
@endsection

@section('title')
Dashboard
@endsection

@section('main')
<main id="main" class="main">
Hello {!! "<b>".Session::get('uname')."</b>" !!} Welcome to Dashboard
</main>
@endsection
