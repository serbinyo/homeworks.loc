@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учащийся
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/admin">Рабочий стол</a> >>
                        <a href="/admin/lists">Списки</a> >>
                        <a href="/admin/lists/schoolkids">Учащиеся</a> >>
                        {{$schoolkid->lastname}}
                        {{$schoolkid->firstname}}
                        {{$schoolkid->middlename}}
                        <hr>

                        <p>
                        <p>ID: {{$schoolkid->id}}</p>
                        <p>
                            {{$schoolkid->lastname}}
                            {{$schoolkid->firstname}}
                            {{$schoolkid->middlename}}
                        </p>
                        <p>
                            <a href="{{route('grade.show', $schoolkid->grade->id)}}">
                                {{$schoolkid->grade->num}}
                                -
                                {{$schoolkid->grade->char}}
                                класс
                            </a>
                        </p>

                        @if($schoolkid->user->email)
                            <p>{{$schoolkid->user->email}}</p>
                        @else
                            <p>Email не добавлен</p>
                        @endif

                        <p>Логин: {{$schoolkid->user->login}}</p>

                        <a href="{{route('kid.edit', ['id'=>$schoolkid->id])}}">
                            <div class="ico_edit"></div>
                        </a>

                        {!! Form::open(['url'=>route('kid.destroy', ['id'=>$schoolkid->id])]) !!}
                        {!! Form::submit('', ['class'=>'ico_delete']) !!}
                        {{method_field('DELETE')}}
                        {!! Form::close() !!}

                    </div>
                    <div style="clear: both"></div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
