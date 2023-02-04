@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <h1 class="display-3">Id: {{ $todo->id }}</h1>
        <h2 class="display-3">Title: {{ $todo->title }}</h2>
        <h3 class="display-3">Description: {{ $todo->description }}</h3>
        <h4 class="display-3">Executed: {{ $todo->executed }}</h4>
        <h5 class="display-3">User_id: {{ $todo->user_id }}</h5>
    </div>

@endsection

@section('js-scripts')
    <script src="{{ asset('src/js/todo.js') }}"></script>
@stop
