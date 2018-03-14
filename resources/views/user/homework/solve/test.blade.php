@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Решить тест</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/desktop">Рабочий стол</a> >>
                        <a href="/homeworks"> Выбор предмета </a> >>
                        <a href="{{route('showUsrDates', $discipline_id)}}"> Даты </a> >>
                        <a href="{{route('showHomeworks', [$discipline_id, $date])}}"> Задания </a> >>
                        <a href="{{route('hometask.show', [
                            'discipline_id' => $discipline_id,
                            'date' => $date,
                            'id' => $homework_id
                            ])}}">Просмотр</a> >>
                        Решить тест
                        <br>
                        <hr>

                        {!! Form::model($test, ['method'=>'put', 'route' => ['given_test.update',
                            'discipline_id' => $discipline_id, 'date' => $date, 'hwrk_id' => $homework_id,
                            'id'=>$test->id], 'class'=>'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('task', 'Вопрос: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <p class="given_test_opt">{!! nl2br($test->task) !!}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('option_a', 'Вариант ответа A: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <p class="given_test_opt">{!! nl2br($test->option_a) !!}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('option_b', 'Вариант ответа B: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <p class="given_test_opt">{!! nl2br($test->option_b) !!}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('option_c', 'Вариант ответа C: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <p class="given_test_opt">{!! nl2br($test->option_c) !!}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('option_d', 'Вариант ответа D: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <p class="given_test_opt">{!! nl2br($test->option_d) !!}</p>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                            {!! Form::label('ans_label', 'Ответ:' , ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <p class="given_test_opt">
                                    {!! Form::label('ans_opt_a', 'Вариант A') !!}
                                    {!! Form::radio('answer', 'A', false, ['id' => 'ans_opt_a', 'class'=>'', 'required']) !!}
                                    <br>
                                    {!! Form::label('ans_opt_b', 'Вариант B') !!}
                                    {!! Form::radio('answer','B', false, ['id' => 'ans_opt_b', 'class'=>'']) !!}
                                    <br>
                                    {!! Form::label('ans_opt_c', 'Вариант C') !!}
                                    {!! Form::radio('answer','C', false, ['id' => 'ans_opt_c', 'class'=>'']) !!}
                                    <br>
                                    {!! Form::label('ans_opt_d', 'Вариант D') !!}
                                    {!! Form::radio('answer','D', false, ['id' => 'ans_opt_d', 'class'=>'']) !!}
                                </p>
                                @if ($errors->has('answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Ответить', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
