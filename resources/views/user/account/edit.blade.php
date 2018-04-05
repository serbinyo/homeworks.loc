@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учетная запись. Редактирование
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

                        <a href="/teacher">Рабочий стол</a> >>
                        <a href="{{ route('kid-account.show', $schoolkid->id) }}">Учетная запись</a> >>
                        Редактирование
                        <hr>


                        {!! Form::open(['method'=>'put', 'route' => ['kid-account.update',
                        $schoolkid->id], 'class'=>'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ $schoolkid->user->email }}" placeholder="Не Обязательно">

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
                                       value="{{ $schoolkid->middlename }}" placeholder="Не обязательно">

                                @if ($errors->has('middlename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <br>
                            
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Редактировать', ['class' => 'btn btn-primary']) !!}
                                или
                                <a href="/kid-account/change_password" class="btn btn-primary">
                                    Изменить пароль
                                </a>
                            </div>
                        </div>

                        {!! Form::close() !!}

                        {{--{!! Form::open(['url'=>route('kid-account.destroy', $schoolkid->id), 'class'=>'center']) !!}--}}
                        {{--{!! Form::submit('Удалить учетную запись') !!}--}}
                        {{--{{method_field('DELETE')}}--}}
                        {{--{!! Form::close() !!}--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
