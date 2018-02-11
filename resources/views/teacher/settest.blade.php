@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Добавление теста в работу!<br><br>

                        {{$id}}<br><br>

                        Выбрать работу и добавить.<br><br>

                        {!! Form::open(['url'=>'route(.store)','method'=>'post']) !!}
                        {!! Form::submit('Добавить тест в работу', ['class'=>'']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
