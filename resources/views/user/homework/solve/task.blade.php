@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Решать задачу</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/desktop">Рабочий стол</a> >>
                        <a href="/homeworks"> Выбор предмета </a> >>
                        <a href="{{route('showUsrDates', $discipline_id)}}"> Даты </a> >>
                        <a href="{{route('showHomeworks', [$discipline_id, $date])}}"> Задания </a> >>
                        <a href="{{route('hometask.show', [
                            'discipline_id' => $discipline_id,
                            'date' => $date,
                            'id' => $homework_id
                            ])}}">Просмотр</a> >>
                        Решать задачу
                        <br>
                        <hr>


                        {!! Form::model($task, ['method'=>'put', 'route' => ['given_task.update',
                            'discipline_id' => $discipline_id, 'date' => $date, 'hwrk_id' => $homework_id,
                            'id'=>$task->id], 'class'=>'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                            {!! Form::label('task', 'Условие задачи: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <p class="">{!! nl2br($task->task)!!}</p>

                                @if ($errors->has('task'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                            {!! Form::label('answer', 'Ответ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('answer', null, ['class'=>'form-control']) !!}

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
