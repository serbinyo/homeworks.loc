@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Учительская</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Teacher worktop!<br>

                        <a href="/teacher/homeworks">Домашние задания</a><br>
                        <a href="/teacher/doneworks">Выполненные работы</a><br>
                        <a href="/teacher/classrooms">В классы</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
