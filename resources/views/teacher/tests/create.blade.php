@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить тест!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/tests">Список тестов</a> >>
                        Новый тест
                        <br><br>

                        {!! Form::open(['url'=>route('tests.store'),'method'=>'post', 'class'=>'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('theme') ? ' has-error' : '' }}">
                            {!! Form::label('theme', 'Тема', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('theme', old('theme'), ['required','class'=>'form-control']) !!}

                                @if ($errors->has('theme'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('theme') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                            {!! Form::label('task', 'Вопрос: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::textarea('task', null, ['required', 'class'=>'form-control']) !!}

                                @if ($errors->has('task'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('option_a') ? ' has-error' : '' }}">
                            {!! Form::label('option_a', 'Вариант ответа A: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::textarea('option_a', null, ['required', 'class'=>'form-control']) !!}

                                @if ($errors->has('option_a'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('option_a') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('option_b') ? ' has-error' : '' }}">
                            {!! Form::label('option_b', 'Вариант ответа B: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::textarea('option_b', null, ['required', 'class'=>'form-control']) !!}

                                @if ($errors->has('option_b'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('option_b') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('option_c') ? ' has-error' : '' }}">
                            {!! Form::label('option_c', 'Вариант ответа C: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::textarea('option_c', null, ['required', 'class'=>'form-control']) !!}

                                @if ($errors->has('option_c'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('option_c') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('option_d') ? ' has-error' : '' }}">
                            {!! Form::label('option_d', 'Вариант ответа D: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::textarea('option_d', null, ['required', 'class'=>'form-control']) !!}

                                @if ($errors->has('option_d'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('option_d') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                            {!! Form::label('ans_label', 'Укажите правильный ответ:' , ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::label('ans_opt_a', 'Вариант A') !!}
                                {!! Form::radio('answer', 'A', false, ['id' => 'ans_opt_a', 'class'=>'form-control', 'required']) !!}

                                {!! Form::label('ans_opt_b', 'Вариант B') !!}
                                {!! Form::radio('answer','B', false, ['id' => 'ans_opt_b', 'class'=>'form-control']) !!}

                                {!! Form::label('ans_opt_c', 'Вариант C') !!}
                                {!! Form::radio('answer','C', false, ['id' => 'ans_opt_c', 'class'=>'form-control']) !!}

                                {!! Form::label('ans_opt_d', 'Вариант D') !!}
                                {!! Form::radio('answer','D', false, ['id' => 'ans_opt_d', 'class'=>'form-control']) !!}

                                @if ($errors->has('answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Сохранить новый тест', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
