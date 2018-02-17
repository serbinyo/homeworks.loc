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

                        <a href="/teacher">Вернуться в учительскую</a><br><br>
                        <a href="{{route('materials.create')}}">Добавить новый материал</a><br><br>

                        Список дополнительных учебных материалов!<br><br>
                        <hr>

                        @foreach($materials as $material)

                            Материал №: {{ $material->id }}<br>
                            Тема: {{$material->theme}}<br>
                            Заголовок: {{$material->title}}<br>
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
