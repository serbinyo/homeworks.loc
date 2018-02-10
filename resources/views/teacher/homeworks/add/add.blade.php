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

                        Добавить домашнее задание!

                        <a href="/teacher/homeworks/add/tasks">Добавить задачу</a><br>
                        <a href="/teacher/homeworks/add/tests">Добавить тест</a><br>
                        <a href="/teacher/homeworks/add/materials">Добавить дополнительный учебный материал</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
