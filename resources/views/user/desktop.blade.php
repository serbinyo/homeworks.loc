@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Рабочий стол<br>
                        Учащийся:
                        {{$schoolkid->firstname}}
                        {{$schoolkid->middlename}}
                        {{$schoolkid->lastname}}<br>
                        Класс: {{$grade}}
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="{{ route('kid-account.show', $schoolkid->id) }}">Профайл</a><br><br>

                        <a href="/homeworks">Домашние задания</a><br>
                        <a href="/statistics">Статистика</a><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
