@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список тестов!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        Список тестов
                        <br><br>

                        <a href="{{route('tests.create')}}">Добавить новый тест</a><br><br>


                        <hr>
                        @foreach($tests as $test)

                            Тест №: {{ $test->id }}<br>
                            Тема: {{$test->theme}}<br>
                            Вопрос: {{$test->task}}<br><br>

                            Добавил: {{$author->getFIO($test->teacher_id)}}<br>
                            Дата добавления: {{ $test->created_at }}<br><br>

                            <a href="{{route('tests.show', ['id'=>$test->id])}}">
                                Просмотр теста
                            </a><br>
                            <hr>

                        @endforeach
                        {{$tests->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
