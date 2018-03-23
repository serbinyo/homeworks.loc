@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Редактировать учетную запись учителя
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
                        <a href="{{route('teach.show', ['id'=>$teacher->id])}}">
                            {{$teacher->lastname}}
                            {{$teacher->firstname}}
                            {{$teacher->middlename}}
                        </a> >>
                        Редактирование
                        <hr>

                        <form class="form-horizontal" method="POST"
                              action="{{ route('teach.update', ['id'=>$teacher->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                                <label for="login" class="col-md-4 control-label">Логин</label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control" name="login"
                                           value="{{$teacher->user->login}}" required autofocus>

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
                                           value="{{$teacher->user->email}}" placeholder="Не обязательно">

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
                                           value="{{ $teacher->lastname }}" required autofocus>

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
                                           value="{{ $teacher->firstname }}" required autofocus>

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
                                           value="{{ $teacher->middlename }}" required autofocus>

                                    @if ($errors->has('middlename'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('discipline') ? ' has-error' : '' }}">
                                <label for="discipline" class="col-md-4 control-label">Дисциплина</label>

                                <div class="col-md-6">
                                    <select name="discipline" class="form-control" id="discipline" required>
                                        <option selected="selected" value="{{$teacher->discipline->id}}">
                                            {{ $teacher->discipline->name }}
                                        </option>
                                        @foreach($disciplines as $discipline)
                                            <option value={{$discipline->id}} >
                                                {{$discipline->name}}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('discipline'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('discipline') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Редактировать
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
