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
                        <a href="{{route('showDates', $grade_id)}}"> Даты </a> >>
                        <a href="{{route('showHwKids', [$grade_id, $date])}}"> >> Задания </a> >>
                        Просмотр
                        <br>
                        <br><br>

                        <p class="works_show_blok_title">Домашнее задание № : {{ $homework->id }}<br>

                            <a href="{{route('works.show', ['id'=>$homework->work->id])}}">
                                По работе: {{$homework->work->id}}
                            </a><br>
                            {{$homework->schoolkid->grade->num}}
                            -
                            {{$homework->schoolkid->grade->char}}<br>
                            {{$homework->schoolkid->lastname}}
                            {{$homework->schoolkid->firstname}}
                            {{$homework->schoolkid->middlename}}<br>
                            Заданно на: {{$homework->date_to_completion}}
                            <br>
                        <hr>


                        @if (!empty($homework_content['given_tasks']))
                            <p class="works_show_blok_title">Задачи:</p>
                            <hr>
                            @foreach($homework_content['given_tasks'] as $task)

                                {!! nl2br($task->task)!!}<br>
                                Эталон: {{$task->standard}}<br>

                                <hr>
                            @endforeach
                        @endif

                        @if (!empty($homework_content['given_tests']))

                            <p class="works_show_blok_title">Тесты:</p>
                            <hr>
                            @foreach($homework_content['given_tests'] as $test)

                                {!! nl2br($test->task) !!}<br>
                                A: {!! nl2br($test->option_a) !!}<br>
                                B: {!! nl2br($test->option_b) !!}<br>
                                C: {!! nl2br($test->option_c) !!}<br>
                                D: {!! nl2br($test->option_d) !!}<br>
                                Эталон: {{$test->standard}}<br>

                                <hr>
                            @endforeach
                        @endif


                        @if (!empty($homework_content['materials']))
                            <p class="works_show_blok_title">Дополнительные учебные материалы:</p>
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


                        Дата создания: {{ $homework->created_at }}<br><br>

                        {!! Form::open(['url'=>route('homework.destroy', [
                        'grade_id' => $grade_id,
                        'date' => $date,
                        'id' => $homework->id
                        ])]) !!}
                        {!! Form::submit('Удалить', ['class'=>'']) !!}
                        {{method_field('DELETE')}}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
