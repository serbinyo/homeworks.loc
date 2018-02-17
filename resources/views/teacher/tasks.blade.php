@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список задач!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Вернуться в учительскую</a><br><br>
                        <a href="{{route('tasks.create')}}">Добавить новую задачу</a><br><br>

                        <hr>
                        @foreach($tasks as $task)

                            Тест №: {{ $task->id }}<br>
                            Тема: {{$task->theme}}<br>
                            Задача: {{$task->task}}<br>
                            <a href="{{route('tasks.show', ['id'=>$task->id])}}">
                                Просмотр задачи
                            </a><br>
                            <hr>

                        @endforeach
                        {{$tasks->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
