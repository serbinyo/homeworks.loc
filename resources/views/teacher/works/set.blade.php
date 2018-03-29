@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Работа №: {{$work_id}}. Задать работу</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/works">Список работ</a> >>
                        <a href="{{route('works.show', ['id'=>$work_id])}}">Просмотр работы</a> >>
                        Задать работу
                        <br><br>

                        Здесь вы можете выбрать и
                        класс и назначить работу в домашнее задание.<br><br>

                        Выбор класса!<br><br>


                        {!! Form::open(['url'=>route('setWork'), 'class'=>'form-horizontal']) !!}
                        {!! Form::hidden('work_id', $work_id) !!}
                        <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
                            <label for="grade" class="col-md-4 control-label">Класс</label>

                            <div class="col-md-6">
                                <select name="grade" class="form-control" id="grade" required>
                                    <option selected="selected" value="">Выберите класс...</option>
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

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Дата</label>

                            <div class="col-md-6">
                                {!! Form::text('date', old('date'), ['required',
                                'class'=>'form-control',
                                'placeholder' => 'ГГГГ-ММ-ДД',
                                'id' => 'datepicker',
                                ]) !!}

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Назначить работу классу', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}<br>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
