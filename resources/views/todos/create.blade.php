@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <h1 class="display-3">Todo Create</h1>
    </div>

    <div>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            <div>
                <label for="title">Title:</label>
                <div class="form-row">
                    <div class="form-group col-6">
                        <input id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                        />
                    </div>
                    <div class="form-group col-6">
                        @error('title')
                            <p class="text-danger py-2 mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label for="description">Description:</label>
                <div class="form-row">
                    <div class="form-group col-6">
                        <textarea
                            id="description"
                            class="form-control @error('description') is-invalid @enderror"
                            rows="5"
                            name="description"
                        >{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group col-6">
                        @error('description')
                            <p class="text-danger py-2 mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <label for="expired-data">Expired data:</label>
                <div class="form-row">
                    <div class="form-group col-6">
                        <div class="input-group date datepicker-input-dafault" id="datepicker" style="padding: 0;">
                            <input id="expired-data"
                                class="form-control @error('expired_data') is-invalid @enderror"
                                type="text"
                                name="expired_data"
                                value="{{ old('expired_data') }}"
                            />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        @error('expired_data')
                            <p class="text-danger py-2 mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>

@endsection

@section('js-scripts')
    <script src="{{ asset('src/js/todo.js') }}"></script>
@stop
