@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Списки
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/admin">Рабочий стол</a> >>
                        Списки
                        <br><br>

                        <a href="/admin/lists/grades">Классы</a><br><br>
                        <a href="/admin/lists/disciplines">Предметы</a><br><br>
                        <a href="/admin/lists/schoolkids">Учащиеся</a><br><br>
                        <a href="/admin/lists/teachers">Учителя</a><br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
