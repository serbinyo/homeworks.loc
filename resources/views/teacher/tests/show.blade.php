@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Тест № : {{ $test->id }}<br>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher/tests/">Вернуться к списку тестов</a><br><br>

                        Просмотр теста!<br>

                        <hr>
                        Тема: {{$test->theme}}<br>
                        Вопрос: {{$test->task}}<br><br>

                        Вариант A: {{ $test->option_a }}<br><br>

                        Вариант B: {{ $test->option_b }}<br><br>

                        Вариант C: {{ $test->option_c }}<br><br>

                        Вариант D: {{ $test->option_d }}<br><br>

                        Ответ: {{ $test->answer }}<br><br>


                        <a href="{{route('setTest', ['id'=>$test->id])}}">
                            Назначить тест
                        </a><br>

                        <hr>

                        @if ($teacher->id === $test->teachers_id)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
