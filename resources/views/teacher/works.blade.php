@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список возможных работ</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        Список работ
                        <br><br>

                        <a href="{{route('works.create')}}">Создать работу</a><br><br>


                        <a href="{{route('works.show', ['id'=>'$work->id'])}}">Просмотр задания</a><br>
                        <hr>
                        @foreach($works as $work)

                            Работа №: {{ $work->id }}<br>
                            Тема: {{$work->theme}}<br><br>

                            Добавил: {{$author->getFIO($work->teacher_id)}}<br>
                            Дата добавления: {{ $work->created_at }}<br><br>

                            <a href="{{route('works.show', ['id'=>$work->id])}}">
                                Просмотр задачи
                            </a><br>
                            <hr>

                        @endforeach
                        {{$works->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
