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

                        <a href="/desktop">Рабочий стол</a> >>
                        <a href="/homeworks"> Предмет </a> >>
                        <a href="{{route('showUsrDates', $discipline_id)}}"> Дата </a> >>
                        <a href="{{route('showHomeworks', [$discipline_id, $date])}}"> Задание </a> >>
                        Просмотр
                        <hr>

                        <p class="works_show_block_title">Домашнее задание по дисциплине:<br>
                            {{ $homework->work->teacher->discipline->name }}<br>
                            Заданно на: {{$homework->date_to_completion}}<br>
                            {{$homework->schoolkid->grade->num}}
                            -
                            {{$homework->schoolkid->grade->char}}<br>
                            {{$homework->schoolkid->lastname}}
                            {{$homework->schoolkid->firstname}}
                            {{$homework->schoolkid->middlename}}<br>
                        <hr>

                        @if (!$homework->computer_mark)
                            @if (!empty($homework_content['given_tasks']))
                                <p class="works_show_block_title">Задачи:</p>
                                <hr>
                                @foreach($homework_content['given_tasks'] as $task)
                                    {!! nl2br($task->task)!!}<br>
                                    @if(!empty($task->answer))
                                        Ваш ответ:
                                        <a href="{{route('given_task.edit', [
                                    $discipline_id, $date, $homework->id, $task->id ])}}">
                                            {!! nl2br($task->answer) !!}
                                        </a>
                                    @else
                                        <a href="{{route('given_task.edit', [
                                            $discipline_id, $date, $homework->id,
                                            $task->id ])}}" class="answer_absent">
                                            Требуется ответ
                                        </a>
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

                                    @if(!empty($test->answer))
                                        Ваш ответ:
                                        <a href="{{route('given_test.edit', [
                                            $discipline_id, $date,
                                            $homework->id, $test->id])}}">
                                            {!! nl2br($test->answer) !!}
                                        </a>
                                    @else
                                        <a href="{{route('given_test.edit', [
                                            $discipline_id, $date, $homework->id, $test->id
                                            ])}}" class="answer_absent">
                                            Требуется ответ
                                        </a>
                                    @endif
                                    <hr>
                                @endforeach
                            @endif

                            {!! Form::open(['url'=>route('passHomework')]) !!}
                            {!! Form::hidden('discipline_id', $discipline_id) !!}
                            {!! Form::hidden('date', $date) !!}
                            {!! Form::hidden('homework_id', $homework->id) !!}
                            {!! Form::submit('Сдать домашнее задание', ['class'=>'']) !!}
                            {!! Form::close() !!}

                        @else
                            <p class="works_show_block_title">
                                Оценка: {{$homework->computer_mark}} <br>
                                Дата выполнения: {{$homework->date_of_completion}}
                            </p>
                            <hr>
                            @if (!empty($homework->teacher_mark))
                                <p class="works_show_block_title">
                                    Оценка учителя: {{$homework->teacher_mark}}
                                    (Имеет больший приоретет)<br>
                                    Причина изменения оценки:<br>
                                    {!! nl2br($homework->teacher_comment) !!}
                                </p>
                                <hr>
                            @endif

                            @if (!empty($homework_content['given_tasks']))
                                <p class="works_show_block_title">Задачи:</p>
                                <hr>
                                @foreach($homework_content['given_tasks'] as $task)
                                    {!! nl2br($task->task)!!}<br>
                                    @if(!empty($task->answer))
                                        Ваш ответ: {!! nl2br($task->answer) !!}
                                    @else
                                        Сдано без ответа
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

                                    @if(!empty($test->answer))
                                        Ваш ответ: {!! nl2br($test->answer) !!}
                                    @else
                                        Сдано без ответа
                                    @endif
                                    <hr>
                                @endforeach
                            @endif

                        @endif
                        @if (!empty($homework_content['materials']))
                            <p class="works_show_block_title">Дополнительные учебные материалы:</p>
                            <hr>
                            @foreach($homework_content['materials'] as $material)

                                Тема: {{$material->theme}}<br>
                                Заголовок: {{ $material->title }}<br>
                                Изображение: {{$material->image}}<br>
                                {!! nl2br($material->body) !!}<br>
                                <hr>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
