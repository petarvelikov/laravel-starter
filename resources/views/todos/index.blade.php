@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <h1 class="display-3 text-center">Todos</h1>
    </div>

    <div>
        <div class="loading-table-message alert alert-info text-center">Данните се зареждат, моля изчакайте!</div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-success">
                {{ session('warning') }}
            </div>
        @endif

        <table id="todos-grid-table" class="table table-active table-bordered">
            <thead>
                <tr>
                    <th>Ид</th>
                    <th>Наименование</th>
                    <th>Описание</th>
                    <th>Изтича на</th>
                    <th>Изпълнен</th>
                    <th class="text-center">
                        <a class="btn btn-success" href="todos/create" title="Добави нов запис"><i class="fas fa-plus"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td class="todo-id">{{ $todo->id }}</td>
                        <td>
                            <span class="normal-mode">{{ $todo->title }}</span>
                            <span class="edit-mode" style="display: none;">
                                <input class="todo-title form-control form-control-sm" type="text" value="{{ $todo->title }}" />
                            </span>
                        </td>
                        <td>
                            <span class="normal-mode">{{ $todo->description }}</span>
                            <span class="edit-mode" style="display: none;">
                                <input class="todo-description form-control form-control-sm" type="text" value="{{ $todo->description }}" />
                            </span>
                        </td>
                        <td>
                            <span class="normal-mode">{{ $todo->expired_data }}</span>
                            <span class="edit-mode" style="display: none;">
                                <div class="input-group date datepicker-input-dafault" id="datepicker" style="padding: 0;">
                                    <input id="expired-data"
                                        class="form-control form-control-sm @error('expired_data') is-invalid @enderror"
                                        type="text"
                                        name="expired_data"
                                        value="{{ $todo->expired_data }}"
                                    />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </span>
                        </td>
                        <td>
                            <span class="normal-mode">{{ $todo->executed }}</span>
                            <span class="edit-mode" style="display: none;">
                                <input class="todo-executed form-control form-control-sm" type="number" min="0" max="1" value="{{ $todo->executed }}" />
                            </span>
                        </td>
                        <td style="width: 150px; text-align: center;">
                            <a class="btn btn-sm btn-info" href="{{ url('todos', $todo->id) }}" title="Прегледай записа"><i class="fas fa-eye"></i></a>
                            <button class="btn-edit-mode-show normal-mode btn btn-sm btn-primary" type="button" title="Редактирай записа"><i class="fas fa-edit"></i></button>
                            <button class="btn-edit-mode-cancel edit-mode btn btn-sm btn-warning" style="display: none;" type="button" title="Отказ"><i class="fas fa-window-close"></i></button>
                            <button class="btn-edit-mode-save edit-mode btn btn-sm btn-success" style="display: none;" type="button" title="Запиши"><i class="fas fa-save"></i></button>
                            <form class="delete-item-form" action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-sm btn-danger" type="sutmit" title="Изтрий записа">
                                     <i class="fas fa-trash-alt"></i>
                                 </button>
                             </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js-scripts')
    <script src="{{ asset('src/js/todo.js') }}"></script>
@stop
