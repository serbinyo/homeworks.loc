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
                        Просмотр
                        <br>
                        <hr>

                        @if (!$homework->computer_mark)

                            <p class="works_show_block_title">
                                Домашнее задание № : {{ $homework->id }}<br>
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

                                Домашнее задание еще не сдано
                                <br>
                            <hr>

                            @if (!empty($homework_content['given_tasks']))
                                <p class="works_show_block_title">Задачи:</p>
                                <hr>
                                @foreach($homework_content['given_tasks'] as $task)
                                    {!! nl2br($task->task)!!}<br><br>

                                    Эталон: {{$task->standard}}
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

                                    Эталон: {{$test->standard}}
                                    <hr>
                                @endforeach
                            @endif

                            @if (!empty($homework_content['materials']))
                                <p class="works_show_block_title">Дополнительные учебные материалы:</p>
                                <hr>
                                @foreach($homework_content['materials'] as $material)
                                    <a href="{{route('materials.show', ['id'=>$material->id])}}">
                                        Дополнительный учебный материал № : {{ $material->id }}
                                    </a><br>
                                    Тема: {{$material->theme}}<br>
                                    Заголовок: {{ $material->title }}<br>
                                    Изображение: {{$material->image}}<br>
                                    {!! nl2br($material->body) !!}<br>
                                    <hr>
                                @endforeach
                            @endif

                        @else

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
                                Оценка: {{$homework->computer_mark}}<br>
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

                            @if (!empty($homework_content['materials']))
                                <p class="works_show_block_title">Дополнительные учебные материалы:</p>
                                <hr>
                                @foreach($homework_content['materials'] as $material)
                                    <a href="{{route('materials.show', ['id'=>$material->id])}}">
                                        Дополнительный учебный материал № : {{ $material->id }}
                                    </a><br>
                                    Тема: {{$material->theme}}<br>
                                    Заголовок: {{ $material->title }}<br>
                                    Изображение: {{$material->image}}<br>
                                    {!! nl2br($material->body) !!}<br>
                                    <hr>
                                @endforeach
                            @endif
                            <a href="{{route('homework.edit', [
                                'grade_id' => $grade_id,
                                'date' => $date,
                                'id' => $homework->id
                                ])}}">
                                Исправить оценку
                            </a>
                            <hr>

                            {!! Form::open(['url'=>route('toRePass')]) !!}
                            {!! Form::hidden('grade_id', $grade_id) !!}
                            {!! Form::hidden('date', $date) !!}
                            {!! Form::hidden('homework_id', $homework->id) !!}
                            {!! Form::submit('На пересдачу', ['class'=>'']) !!}
                            {!! Form::close() !!}
                            <hr>
                        @endif



                        {!! Form::open(['url'=>route('homework.destroy', [
                        'grade_id' => $grade_id,
                        'date' => $date,
                        'id' => $homework->id
                        ])]) !!}
                        {!! Form::submit('Удалить домашнее задание', ['class'=>'']) !!}
                        {{method_field('DELETE')}}
                        {!! Form::close() !!}
                        <hr>

                        Дата создания: {{ $homework->created_at }}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
