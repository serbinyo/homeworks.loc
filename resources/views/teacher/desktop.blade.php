@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учительская <br>
                        Предмет: {{$discipline}}<br>
                        Учитель: {{$teacher_fio}}<br>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{route('works.index')}}">Домашние задания</a><br><br>

                        <a href="{{route('tasks.index')}}">Задачи</a><br>
                        <a href="{{route('tests.index')}}">Тесты</a><br>
                        <a href="{{route('materials.index')}}">Дополнительные учебные материалы</a><br><br><br><br>

                        <a href="/teacher/doneworks">Выполненные работы</a><br>
                        <a href="/teacher/classrooms">В классы</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
