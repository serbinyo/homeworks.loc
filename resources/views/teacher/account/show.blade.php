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

                        <a href="/teacher">Учительская</a> >>
                        Учетная запись
                        <br><br>

                        <a href="/teacher/lists/grades">Классы</a><br><br>
                        <a href="/teacher/lists/disciplines">Предметы</a><br><br>
                        <a href="/teacher/lists/schoolkids">Учащиеся</a><br><br>
                        <a href="/teacher/lists/teachers">Учителя</a><br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
