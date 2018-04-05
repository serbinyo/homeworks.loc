@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учетная запись
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/desktop">Рабочий стол</a> >>
                        Учетная запись
                        <hr>
                        ФИО: {{$schoolkid->firstname}}
                        {{$schoolkid->middlename}}
                        {{$schoolkid->lastname}}<br>
                        E-mail:
                        @if ($schoolkid->user->email)
                            {{$schoolkid->user->email}}
                        @else
                            не указан
                        @endif
                        <br>
                        Класс:
                        {{$schoolkid->grade->num}}
                        -
                        {{$schoolkid->grade->char}}<br>
                        Логин:
                        {{$schoolkid->user->login}}<br><br>

                        <a href="{{route('kid-account.edit', $schoolkid->id)}}">Изменить данные</a><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
