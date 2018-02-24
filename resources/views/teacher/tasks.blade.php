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

                        @include('common.errors')


                        <a href="/teacher">Учительская</a> >>
                        Список задач
                        <br><br>

                        <a href="{{route('tasks.create')}}">Добавить новую задачу</a><br><br>

                        <hr>
                        @foreach($tasks as $task)

                            Задача №: {{ $task->id }}<br>
                            Тема: {{$task->theme}}<br>
                            Условие: {{$task->task}}<br><br>

                            Добавил: {{$author->getFIO($task->teacher_id)}}<br>
                            Дата добавления: {{ $task->created_at }}<br><br>

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
