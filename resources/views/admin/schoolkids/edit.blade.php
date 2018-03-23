@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Редактировать учетную запись ученика
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->has('no_chenge'))
                            <div class="alert alert-danger">
                                <div class="message js-form-message">
                                    {{ $errors->first('no_chenge') }}
                                </div>
                            </div>
                        @endif

                        <a href="/admin">Рабочий стол</a> >>
                        <a href="/admin/lists">Списки</a> >>
                        <a href="/admin/lists/schoolkids">Учащиеся</a> >>
                        <a href="{{route('kid.show', ['id'=>$schoolkid->id])}}">
                            {{$schoolkid->lastname}}
                            {{$schoolkid->firstname}}
                            {{$schoolkid->middlename}}
                        </a> >>
                        Редактирование
                        <hr>

                        <form class="form-horizontal" method="POST"
                              action="{{ route('kid.update', ['id'=>$schoolkid->id]) }}">
                            {{ csrf_field() }}
                            {!! method_field('PUT') !!}

                            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                                <label for="login" class="col-md-4 control-label">Логин</label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control" name="login"
                                           value="{{ $schoolkid->user->login }}" required autofocus>

                                    @if ($errors->has('login'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{$schoolkid->user->email}}" placeholder="Не обязательно">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname"
                                           value="{{ $schoolkid->lastname }}" required>

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="firstname" class="col-md-4 control-label">Имя</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname"
                                           value="{{ $schoolkid->firstname }}" required>

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                                <label for="middlename" class="col-md-4 control-label">Отчество</label>

                                <div class="col-md-6">
                                    <input id="middlename" type="text" class="form-control" name="middlename"
                                           value="{{ $schoolkid->middlename }}" placeholder="не обязательно">

                                    @if ($errors->has('middlename'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
                                <label for="grade" class="col-md-4 control-label">Класс</label>

                                <div class="col-md-6">
                                    <select name="grade" class="form-control" id="grade" required>
                                        <option selected="selected" value="{{ $schoolkid->grade->id }}">
                                            {{$schoolkid->grade->num}}
                                            -
                                            {{$schoolkid->grade->char}}
                                        </option>
                                        @foreach($grades as $grade)
                                            <option value={{$grade->id}} >
                                                {{$grade->num}}
                                                -
                                                {{$grade->char}}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('grade'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Зарегистрировать
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
