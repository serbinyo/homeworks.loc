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

                        Просмотр домашнего задания!<br>

                        <a href="{{route('works.edit', ['id'=>'$work->id'])}}">Изменить задание</a><br>

                        <a href="{{route('setHomework', ['id'=>'$work->id'])}}">Назначить задание</a><br>

                        {!! Form::open(['url'=>route('works.destroy', ['id'=>'$work->id'])]) !!}
                        {!! Form::submit('Удалить', ['class'=>'']) !!}
                        {{method_field('DELETE')}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
