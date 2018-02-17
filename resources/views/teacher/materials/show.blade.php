@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Дополнительный учебный материал № : {{ $material->id }}
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher/materials/">Вернуться к списку учебных материалов</a><br><br>

                        Просмотр дополнительного учебного материала!<br>

                        <hr>
                        Тема: {{$material->theme}}<br>
                        Изображение: {{$material->image}}<br><br>

                        Заголовок: {{ $material->title }}<br><br>

                        {!! nl2br($material->body) !!}<br><br>

                        <a href="{{route('setMaterial', ['id'=>$material->id])}}">
                            Назначить
                        </a><br>

                        <hr>

                        @if ($teacher->id === $material->teachers_id)
                            <a href="{{route('materials.edit', ['id'=>$material->id])}}">Изменить</a><br>

                            {!! Form::open(['url'=>route('materials.destroy', ['id'=>$material->id])]) !!}
                            {!! Form::submit('Удалить', ['class'=>'']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}
                        @else
                            <p>
                                Вы не можете править и удалять тесты которые не создавали
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
