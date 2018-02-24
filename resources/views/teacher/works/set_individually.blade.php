@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Задать работу</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Здесь вы можете выбрать и
                        класс и назначить.<br><br>

                        {{$work_id}}<br><br>

                        Выбор класса!<br><br>

                        {!! Form::open(['url'=>route('homeworks.store'),'method'=>'post']) !!}
                        {!! Form::submit('Назначить задание', ['class'=>'']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
