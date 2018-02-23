@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Просмотр теста!
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/tests/">Список тестов</a> >>
                        Просмотр теста
                        <br><br>

                        Тест № : {{ $test->id }}<br>

                        <hr>
                        Тема: {{$test->theme}}<br>
                        Вопрос: {!! nl2br($test->task) !!}<br><br>

                        Вариант A: {!! nl2br($test->option_a) !!}<br><br>

                        Вариант B: {!! nl2br($test->option_b) !!}<br><br>

                        Вариант C: {!! nl2br($test->option_c) !!}<br><br>

                        Вариант D: {!! nl2br($test->option_d) !!}<br><br>

                        Ответ: {{ $test->answer }}<br><br>

                        Создал: {{$author_fio}}<br>
                        Дата создания: {{ $test->created_at }}<br><br>

                        {!! Form::open(['url'=>route('setTest')]) !!}
                        {!! Form::hidden('test_id', $test->id) !!}
                        <div class="form-group{{ $errors->has('work_id') ? ' has-error' : '' }}">
                            <label for="work_id" class="col-md-4 control-label">Добавить тест к работе:</label>

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

                        @if ($teacher->id === $test->teacher_id)
                            <a href="{{route('tests.edit', ['id'=>$test->id])}}">Изменить</a><br>

                            {!! Form::open(['url'=>route('tests.destroy', ['id'=>$test->id])]) !!}
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
