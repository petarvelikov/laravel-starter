@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <h1 class="display-3 text-center">Home</h1>
    </div>

    <br>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

@endsection
