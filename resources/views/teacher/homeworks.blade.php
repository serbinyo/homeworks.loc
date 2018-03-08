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
                        Выбор класса
                        <br><br>


                        Выберите класс:
                        <hr>
                        @foreach($grades as $grade)


                            <a href="{{route('showHomeworks', $grade->id)}}">
                                {{$grade->num}}
                                -
                                {{$grade->char}}
                            </a>
                            <hr>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
