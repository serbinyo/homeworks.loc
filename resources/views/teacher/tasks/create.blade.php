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
                        @include('common.errors')
                        Добавить задачу!<br><br>

                        Форма добавления<br><br>


                        {!! Form::open(['route'=>'tasks.store','method'=>'post']) !!}

                        {!! Form::label('theme', 'Тема задачи:') !!}<br>
                        {!! Form::text('theme', '',['required']) !!}<br>

                        {!! Form::label('task', 'Задание:') !!}<br>
                        {!! Form::textarea('task', '', ['required']) !!}<br>

                        {!! Form::label('answer', 'Ответ:') !!}<br>
                        {!! Form::text('answer', '', ['required']) !!}<br><br>

                        {!! Form::submit('Сохранить новую задачу', ['class'=>'']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
