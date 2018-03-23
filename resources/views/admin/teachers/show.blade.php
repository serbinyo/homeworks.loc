@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учетная запись преподавателя
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
                        <a href="/admin/lists/teachers">Преподаватели</a> >>
                        {{$teacher->lastname}}
                        {{$teacher->firstname}}
                        {{$teacher->middlename}}
                        <hr>

                        <div class="center-show-title">
                            <p>
                                {{$teacher->lastname}}
                                {{$teacher->firstname}}
                                {{$teacher->middlename}}
                            </p>
                        </div>
                        <div class="center-edt-del">
                            <a href="{{route('teach.edit', ['id'=>$teacher->id])}}">
                                <div class="ico_edit"></div>
                            </a>

                            {!! Form::open(['url'=>route('teach.destroy', ['id'=>$teacher->id])]) !!}
                            {!! Form::submit('', ['class'=>'ico_delete']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}
                        </div>
                        <div style="clear: both"></div>

                        <p>
                            ID: {{$teacher->id}}
                        </p>

                        <p>
                            <a href="{{route('discipline.show', $teacher->discipline->id)}}">
                                {{$teacher->discipline->name}}
                            </a>
                        </p>

                        @if($teacher->user->email)
                            <p>{{$teacher->user->email}}</p>
                        @else
                            <p>Email не добавлен</p>
                        @endif

                        <p>Логин: {{$teacher->user->login}}</p>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
