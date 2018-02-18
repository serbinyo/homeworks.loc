@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Задача № : {{ $task->id }}<br>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/tasks/">Список задач</a> >>
                        Просмотр задачи
                        <br><br>

                        Просмотр задачи!<br>

                        <hr>
                        Тема: {{$task->theme}}<br><br>
                        Условие задачи: {{$task->task}}<br><br>

                        Ответ: {{ $task->answer }}<br><br>

                        Добавил: {{$author_fio}}<br><br>

                        Дата добавления: {{ $task->created_at }}<br><br>

                        <a href="{{route('setTask', ['id'=>$task->id])}}">
                            Назначить задачу
                        </a><br>

                        <hr>

                        @if ($teacher->id === $task->teachers_id)
                            <a href="{{route('tasks.edit', ['id'=>$task->id])}}">Изменить</a><br>

                            {!! Form::open(['url'=>route('tasks.destroy', ['id'=>$task->id])]) !!}
                            {!! Form::submit('Удалить', ['class'=>'']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}
                        @else
                            <p>
                                Вы не можете править и удалять тесты которые не создавали
                            </p>
                        @endif
                        <div class="err_message">
                            @include('common.errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
