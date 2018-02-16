@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')
                        Добавить тест!<br><br>

                        Форма добавления<br><br>

                        {!! Form::open(['url'=>route('tests.store'),'method'=>'post', 'id'=>'addform']) !!}

                        {!! Form::label('theme', 'Тема') !!}
                        {!! Form::text('theme', '',['']) !!}<br>

                        {!! Form::label('task', 'Вопрос: ') !!}<br>
                        {!! Form::textarea('task', '',['']) !!}<br>

                        {!! Form::label('option_a', 'Вариант ответа A: ') !!}<br>
                        {!! Form::textarea('option_a', '')!!}<br>

                        {!! Form::label('option_b', 'Вариант ответа B:') !!}<br>
                        {!! Form::textarea('option_b', '',['']) !!}<br>

                        {!! Form::label('option_c', 'Вариант ответа C:') !!}<br>
                        {!! Form::textarea('option_c', '')!!}<br>

                        {!! Form::label('option_d', 'Вариант ответа D:') !!}<br>
                        {!! Form::textarea('option_d', '',['']) !!}<br><br>

                        {!! Form::label('ans_label', 'Укажите правильный вариант ответа:') !!}<br>

                        {!! Form::label('ans_opt_a', 'Вариант A') !!}
                        {!! Form::radio('answer', 'A', false, ['id' => 'ans_opt_a','']) !!}

                        {!! Form::label('ans_opt_b', 'Вариант B') !!}
                        {!! Form::radio('answer','B', false, ['id' => 'ans_opt_b','']) !!}

                        {!! Form::label('ans_opt_c', 'Вариант C') !!}
                        {!! Form::radio('answer','C', false, ['id' => 'ans_opt_c','']) !!}

                        {!! Form::label('ans_opt_d', 'Вариант D') !!}
                        {!! Form::radio('answer','D', false, ['id' => 'ans_opt_d','']) !!}<br>

                        {!! Form::submit('Сохранить новый тест', ['class' => '', 'id' => "addform-submit"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
