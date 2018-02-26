@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учетная запись
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        Учетная запись
                        <hr>
                        ID: {{$teacher->id}}<br>
                        ФИО: {{$teacher->firstname}}
                        {{$teacher->middlename}}
                        {{$teacher->lastname}}<br>
                        E-mail: {{$teacher->user->email}}<br>
                        Предмет: {{$teacher->discipline->name}}<br>
                        Логин: {{$teacher->user->login}}<br><br>

                        <a href="{{route('account.edit', $teacher->id)}}">Изменить данные</a><br>
                        {!! Form::open(['url'=>route('account.destroy', $teacher->id)]) !!}
                        {!! Form::submit('Удалить учетную запись', ['class'=>'']) !!}
                        {{method_field('DELETE')}}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
