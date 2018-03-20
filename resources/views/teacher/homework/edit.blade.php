@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Просмотр работы!
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/homeworks"> Выбор класса </a> >>
                        <a href="{{route('showTcrDates', $grade_id)}}"> Даты </a> >>
                        <a href="{{route('showHwKids', [$grade_id, $date])}}"> Задания </a> >>
                        <a href="{{route('homework.show', [$grade_id, $date, $homework->id])}}"> Просмотр </a> >>
                        Исправить оценку

                        <hr>


                        <p class="works_show_block_title">Домашнее задание № : {{ $homework->id }}<br>
                            <a href="{{route('works.show', ['id'=>$homework->work->id])}}">
                                По работе № {{$homework->work->id}}
                            </a><br>
                            {{$homework->schoolkid->grade->num}}
                            -
                            {{$homework->schoolkid->grade->char}}<br>
                            {{$homework->schoolkid->lastname}}
                            {{$homework->schoolkid->firstname}}
                            {{$homework->schoolkid->middlename}}<br>
                            Заданно на: {{$homework->date_to_completion}}<br><br>

                            Дата выполнения: {{$homework->date_of_completion}}<br>
                            Оценка в процентах: {{$homework->computer_mark}} %<br>
                        </p>
                        <hr>
                        @if (!empty($homework->teacher_mark))
                            <p class="works_show_block_title">
                                Оценка учителя в процентах: {{$homework->teacher_mark}} %
                                (Имеет больший приоретет)<br>
                                Причина изменения оценки:<br>
                                {!! nl2br($homework->teacher_comment) !!}
                            </p>
                        @endif
                        <hr>


                        @if (!empty($homework_content['given_tasks']))
                            <p class="works_show_block_title">Задачи:</p>
                            <hr>
                            @foreach($homework_content['given_tasks'] as $task)
                                {!! nl2br($task->task)!!}<br><br>

                                Эталон: {{$task->standard}}<br>
                                @if(!empty($task->answer))
                                    <p class="answer_exist">
                                        Ответ учащегося: {{$task->answer}}
                                    </p>
                                @else
                                    <p class="answer_absent">
                                        Сдано без ответа
                                    </p>
                                @endif
                                <hr>
                            @endforeach
                        @endif

                        @if (!empty($homework_content['given_tests']))
                            <p class="works_show_block_title">Тесты:</p>
                            <hr>
                            @foreach($homework_content['given_tests'] as $test)
                                {!! nl2br($test->task) !!}<br>
                                A: {!! nl2br($test->option_a) !!}<br>
                                B: {!! nl2br($test->option_b) !!}<br>
                                C: {!! nl2br($test->option_c) !!}<br>
                                D: {!! nl2br($test->option_d) !!}<br><br>

                                Эталон: {{$test->standard}}<br>
                                @if(!empty($test->answer))
                                    <p class="answer_exist">
                                        Ответ учащегося: {!! nl2br($test->answer) !!}
                                    </p>
                                @else
                                    <p class="answer_absent">
                                        Сдано без ответа
                                    </p>
                                @endif
                                <hr>
                            @endforeach
                        @endif

                        {!! Form::open(['route' =>
                        ['homework.update',
                        'grade_id' => $grade_id,
                        'date' => $date,
                        'id' => $homework->id
                        ], 'method' => 'put', 'class'=>'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('teacher_comment') ? ' has-error' : '' }}">
                            {!! Form::label('teacher_comment', 'Причина изменения: ',
                            ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::textarea('teacher_comment', $homework->teacher_comment, ['required', 'class'=>'form-control',
                                'placeholder' => 'Напишите пару слов']) !!}

                                @if ($errors->has('teacher_comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teacher_comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('teacher_mark') ? ' has-error' : '' }}">
                            {!! Form::label('teacher_mark', 'Оценка в процентах', ['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('teacher_mark', $homework->teacher_mark,
                                ['class'=>'form-control', 'placeholder' => 'От 10 до 100']) !!}

                                @if ($errors->has('teacher_mark'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teacher_mark') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Выставить оценку', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
