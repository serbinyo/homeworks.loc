@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Работа №: {{$work_id}}. Задать индивидуально</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/works/">Список работ</a> >>
                        <a href="{{route('works.show', ['id'=>$work_id])}}">Просмотр работы</a> >>
                        Задать индивидуально
                        <br><br>

                        Здесь вы можете выбрать ученика и назначить работу в домашнее задание.<br><br>

                        {!! Form::open(['url'=>route('setIndividually')]) !!}
                        {!! Form::hidden('schoolkid_id', 3) !!}
                        {!! Form::hidden('work_id', $work_id) !!}
                        {!! Form::submit('Назначить работу ученику 3', ['class'=>'']) !!}
                        {!! Form::close() !!}<br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
