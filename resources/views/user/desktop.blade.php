@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Рабочий стол</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/homeworks">Домашние задания</a><br>
                        <a href="/statistics">Статистика</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
