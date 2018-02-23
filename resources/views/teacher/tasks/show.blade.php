@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Просмотр задачи!
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/tasks/">Список задач</a> >>
                        Просмотр задачи
                        <br><br>


                        Задача № : {{ $task->id }}<br>

                        <hr>
                        Тема: {{$task->theme}}<br><br>
                        Условие задачи: {!! nl2br($task->task)!!}<br><br>

                        Ответ: {{ $task->answer }}<br><br>

                        Создал: {{$author_fio}}<br>
                        Дата создания: {{ $task->created_at }}<br><br>


                        {!! Form::open(['url'=>route('setTask')]) !!}
                        {!! Form::hidden('task_id', $task->id) !!}
                        <div class="form-group{{ $errors->has('work_id') ? ' has-error' : '' }}">
                            <label for="work_id" class="col-md-4 control-label">Добавить задачу к работе:</label>

                            <div class="col-md-6">
                                <select name="work_id" class="form-control" id="work_id" required>
                                    <option selected="selected" value="">Выберите работу...</option>
                                    @foreach($works as $work)
                                        <option value={{$work->id}} >
                                            N: {{$work->id}}
                                            {{$work->theme}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {!! Form::submit('Добавить к работе', ['class'=>'']) !!}
                        {!! Form::close() !!}

                        <hr>

                        @if ($teacher->id === $task->teacher_id)
                            <a href="{{route('tasks.edit', ['id'=>$task->id])}}">Изменить</a><br>

                            {!! Form::open(['url'=>route('tasks.destroy', ['id'=>$task->id])]) !!}
                            {!! Form::submit('Удалить', ['class'=>'']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}
                        @else
                            <p>
                                Вы не можете править и удалять тесты которые не создавали
                            </p>
                        @endif
                        <div class="err_message">
                            @include('common.errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
