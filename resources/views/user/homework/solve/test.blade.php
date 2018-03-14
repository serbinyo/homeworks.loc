@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Решать тест</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                            <a href="/desktop">Рабочий стол</a> >>
                            <a href="/homeworks"> Выбор предмета </a> >>
                            <a href="{{route('showUsrDates', $discipline_id)}}"> Даты </a> >>
                            <a href="{{route('showHomeworks', [$discipline_id, $date])}}"> Задания </a> >>
                            Просмотр
                            <br>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
