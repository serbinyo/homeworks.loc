@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Домашние задания</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/homeworks"> Выбор класса </a> >>
                        Даты
                        <br>
                        <hr>


                        @foreach($dates as $date)

                            <a href="{{route('showHwKids', [$grade_id, $date->date_to_completion])}}">
                                {{ $date->date_to_completion }}
                            </a>
                            <hr>

                        @endforeach
                        {{$dates->links()}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
