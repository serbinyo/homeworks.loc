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
                        <a href="/teacher/works/">Список работ</a>

                        <br><br>
                        <p class="works_show_blok_title">Работа № : {{ $work->id }}<br>
                            Тема: {{$work->theme}}</p>
                        <hr>


                        @if(empty($work_content['tasks']) && empty($work_content['tests']))
                            <p class="works_show_blok_title">Автор не добавил заданий к этой работе</p>
                        @else

                            @if (!empty($work_content['tasks']))
                                <p class="works_show_blok_title">Задачи:</p>
                                <hr>
                                @foreach($work_content['tasks'] as $task)
                                    <a href="{{route('tasks.show', ['id'=>$task->id])}}">
                                        Задача №: {{ $task->id }}
                                    </a>
                                    <br>
                                    {!! nl2br($task->task)!!}<br>
                                    Ответ: {{$task->answer}}<br>

                                    {!! Form::open(['url'=>route('unsetTask')]) !!}
                                    {!! Form::hidden('task_id', $task->id) !!}
                                    {!! Form::hidden('work_id', $work->id) !!}
                                    {!! Form::submit('Открепить от работы', ['class'=>'']) !!}
                                    {!! Form::close() !!}
                                    <hr>
                                @endforeach
                            @else
                                <p>В работе нет задач</p>
                                <hr>
                            @endif

                            @if (!empty($work_content['tests']))
                                <p class="works_show_blok_title">Тесты:</p>
                                <hr>
                                @foreach($work_content['tests'] as $test)
                                    <a href="{{route('tests.show', ['id'=>$test->id])}}">
                                        Тест №: {{ $test->id }}
                                    </a><br>
                                    {!! nl2br($test->task) !!}<br>
                                    A: {!! nl2br($test->option_a) !!}<br>
                                    B: {!! nl2br($test->option_b) !!}<br>
                                    C: {!! nl2br($test->option_c) !!}<br>
                                    D: {!! nl2br($test->option_d) !!}<br>
                                    Ответ: {{$test->answer}}<br>

                                    {!! Form::open(['url'=>route('unsetTest')]) !!}
                                    {!! Form::hidden('test_id', $test->id) !!}
                                    {!! Form::hidden('work_id', $work->id) !!}
                                    {!! Form::submit('Открепить от работы', ['class'=>'']) !!}
                                    {!! Form::close() !!}
                                    <hr>
                                @endforeach
                            @else
                                <p>В работе нет тестов</p>
                                <hr>
                            @endif
                        @endif

                        @if (!empty($work_content['materials']))
                            <p class="works_show_blok_title">Дополнительные учебные материалы:</p>
                            <hr>
                            @foreach($work_content['materials'] as $material)
                                <a href="{{route('materials.show', ['id'=>$material->id])}}">
                                    Дополнительный учебный материал № : {{ $material->id }}
                                </a><br>
                                Тема: {{$material->theme}}<br>
                                Заголовок: {{ $material->title }}<br>
                                Изображение: {{$material->image}}<br>
                                {!! nl2br($material->body) !!}<br>

                                {!! Form::open(['url'=>route('unsetMaterial')]) !!}
                                {!! Form::hidden('material_id', $material->id) !!}
                                {!! Form::hidden('work_id', $work->id) !!}
                                {!! Form::submit('Открепить от работы', ['class'=>'']) !!}
                                {!! Form::close() !!}
                                <hr>
                            @endforeach
                        @endif


                        Создал: {{$author_fio}}<br>
                        Дата создания: {{ $work->created_at }}<br>

                        @if ($teacher->id === $work->teacher_id)
                            <a href="{{route('works.edit', ['id'=>$work->id])}}">Изменить</a><br>

                            {!! Form::open(['url'=>route('works.destroy', ['id'=>$work->id])]) !!}
                            {!! Form::submit('Удалить', ['class'=>'']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}
                        @else
                            <p>
                                Вы не можете править и удалять работы которые не создавали
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
