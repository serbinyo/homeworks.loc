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
                        <a href="{{route('showDates', $grade_id)}}"> Даты </a> >>
                        Задания
                        <br>
                        <hr>


                        @foreach($homeworks as $homework)
                            <a href="{{route('homework.show', [
                            'grade_id' => $grade_id,
                            'date' => $date,
                            'id' => $homework->id
                            ])}}">
                                {{$homework->schoolkid->lastname }}
                                {{$homework->schoolkid->firstname}}
                                {{$homework->schoolkid->middlename}}
                            </a>
                            (
                            <a href="{{route('works.show', ['id'=>$homework->work_id])}}">
                                Работа N:
                                {{$homework->work_id}}
                            </a>
                            )

                            <hr>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
