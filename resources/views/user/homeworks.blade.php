@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Домашние задания. Выбор предмета</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/desktop">Рабочий стол</a> >>
                        Выбор предмета
                        <hr>

                        @foreach($disciplines as $discipline)

                            <a href="{{route('showUsrDates', $discipline->id)}}">
                                {{$discipline->name}}

                            </a>
                            <hr>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
