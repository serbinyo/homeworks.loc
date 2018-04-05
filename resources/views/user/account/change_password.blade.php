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

                        @if ($errors->has('no_chenge'))
                            <div class="alert alert-danger">
                                <div class="message js-form-message">
                                    {{ $errors->first('no_chenge') }}
                                </div>
                            </div>
                        @endif

                        <a href="/desktop">Рабочий стол</a> >>
                        <a href="{{ route('kid-account.show', $schoolkid->id) }}">Учетная запись</a> >>
                        <a href="{{route('kid-account.edit', $schoolkid->id)}}">Редактирование</a> >>
                        Смена пароля
                        <hr>


                        {!! Form::open(['method'=>'post', 'route' => ['userPasswordChange'], 'class'=>'form-horizontal']) !!}

                        {!! Form::hidden ('id', $schoolkid->id) !!}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('password-new') ? ' has-error' : '' }}">
                            <label for="password-new" class="col-md-4 control-label"> Новый пароль</label>

                            <div class="col-md-6">
                                <input id="password-new" type="password" class="form-control" name="password-new"
                                       required>

                                @if ($errors->has('password-new'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password-new') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Подтверждение
                                пароля</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password-new_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Обновить данные', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
