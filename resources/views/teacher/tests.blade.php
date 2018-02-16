@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Список тестов!<br>

                        <a href="{{route('tests.show', ['id'=>'$test->id'])}}">Просмотр теста</a><br>
                        <a href="{{route('tests.create')}}">Добавить новый тест</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection