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

                        <a href="/desktop">Рабочий стол</a> >>
                        <a href="/homeworks"> Выбор предмета </a> >>
                        <a href="{{route('showUsrDates', $discipline_id)}}"> Даты </a> >>
                        Задания
                        <br>
                        <hr>


                        <? $i = 1 ?>
                        @foreach($homeworks as $homework)

                            <a href="{{route('hometask.show', [
                            'discipline_id' => $discipline_id,
                            'date' => $date,
                            'id' => $homework->id
                            ])}}">
                                Домашнее задание {{$i++}}<br>
                            </a>
                            <hr>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
