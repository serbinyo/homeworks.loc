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
                        <a href="/teacher/works/">Список работ</a> >>

                        <br><br>

                        Работа № : {{ $work->id }}<br>

                        <hr>
                        Тема: {{$work->theme}}<br><br>


                        Добавил: {{$author_fio}}<br><br>


                        Дата добавления: {{ $work->created_at }}<br><br>

                        <a href="">
                            Назначить тест
                        </a><br>

                        <hr>

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
