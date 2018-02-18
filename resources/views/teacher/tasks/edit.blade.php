@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать задачу!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/tasks/">Список задач</a> >>
                        <a href="{{route('tasks.show', ['id'=>$task_to_update->id])}}">Просмотр задачи</a> >>
                        Редактирование
                        <br><br>

                        Форма редактирования задачи<br><br>

                        {!! Form::model($task_to_update, ['method'=>'put', 'route' => ['tasks.update',
                        $task_to_update->id], 'class'=>'form-horizontal']) !!}

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
                            {!! Form::label('task', 'Условие задачи: ', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::textarea('task', null,['required', 'class'=>'form-control']) !!}

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
                                {!! Form::text('answer', null, ['required','class'=>'form-control']) !!}

                                @if ($errors->has('answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Обновить задачу', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
