@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Просмотр дополнительного учебного материала!
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/materials/">Список материалов</a> >>
                        Просмотр материала
                        <br><br>


                        Дополнительный учебный материал № : {{ $material->id }}

                        <hr>
                        Тема: {{$material->theme}}<br>
                        Изображение: {{$material->image}}<br><br>

                        Заголовок: {{ $material->title }}<br><br>

                        {!! nl2br($material->body) !!}<br><br>

                        Создал: {{$author_fio}}<br>
                        Дата создания: {{ $material->created_at }}<br><br>


                        {!! Form::open(['url'=>route('setMaterial')]) !!}
                        {!! Form::hidden('material_id', $material->id) !!}
                        <div class="form-group{{ $errors->has('work_id') ? ' has-error' : '' }}">
                            <label for="work_id" class="col-md-4 control-label">Добавить материал к работе:</label>

                            <div class="col-md-6">
                                <select name="work_id" class="form-control" id="work_id" required>
                                    <option selected="selected" value="">Выберите работу...</option>
                                    @foreach($works as $work)
                                        <option value={{$work->id}} >
                                            N: {{$work->id}}
                                            {{$work->theme}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {!! Form::submit('Добавить к работе', ['class'=>'']) !!}
                        {!! Form::close() !!}

                        <hr>

                        @if ($teacher->id === $material->teacher_id)
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
                        <div class="err_message">
                            @include('common.errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
