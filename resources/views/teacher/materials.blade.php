@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список дополнительных учебных материалов!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        Список материалов
                        <br><br>

                        <a href="{{route('materials.create')}}">Добавить новый материал</a><br><br>

                        <hr>
                        @foreach($materials as $material)

                            Материал №: {{ $material->id }}<br>
                            Тема: {{$material->theme}}<br>
                            Заголовок: {{$material->title}}<br><br>

                            Добавил: {{$author->getFIO($material->teacher_id)}}<br>
                            Дата добавления: {{ $material->created_at }}<br><br>

                            <a href="{{route('materials.show', ['id'=>$material->id])}}">
                                Просмотр материала
                            </a><br>
                            <hr>

                        @endforeach
                        {{$materials->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
