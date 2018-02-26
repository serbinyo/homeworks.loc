@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учительская <br>
                        Предмет: {{$discipline}}<br>
                        Учитель:
                        {{$teacher->firstname}}
                        {{$teacher->middlename}}
                        {{$teacher->lastname}}<br>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="{{route('works.index')}}">Работы</a><br><br>

                        <a href="{{route('tasks.index')}}">Задачи</a><br>
                        <a href="{{route('tests.index')}}">Тесты</a><br>
                        <a href="{{route('materials.index')}}">Дополнительные учебные материалы</a><br><br>

                        {{--<a href="/teacher/doneworks">Выполненные работы</a><br>--}}
                        <a href="{{ route('account.show', $teacher->id) }}">Профайл</a><br>
                        <a href="/teacher/lists">Списки</a><br><br>

                        <a href="/teacher/register">Зарегистрировать учителя</a><br>
                        <a href="/teacher/register/user">Зареистрировать ученика</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
