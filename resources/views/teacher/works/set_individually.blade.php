@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Работа №: {{$work_id}}. Задать индивидуально</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/works/">Список работ</a> >>
                        <a href="{{route('works.show', ['id'=>$work_id])}}">Просмотр работы</a> >>
                        Задать индивидуально
                        <br><br>

                        Здесь вы можете выбрать ученика и назначить работу в домашнее задание.<br><br>

                        @if (empty($grade))

                            {!! Form::open(['url'=>route('indexIndividually', ['id'=>$work_id]),
                            'class'=>'form-horizontal',
                            'method' => 'GET'])
                            !!}

                            <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
                                <label for="grade" class="col-md-4 control-label">Класс</label>

                                <div class="col-md-6">
                                    <select name="grade" class="form-control" id="grade" required>
                                        <option selected="selected" value="">Выберите класс...</option>
                                        @foreach($grades as $grade)
                                            <option value={{$grade->id}} >
                                                {{$grade->name}}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('grade'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit('Выбрать', ['class'=>'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}<br>


                        @else



                            {!! Form::open(['url'=>route('setIndividually')]) !!}
                            {!! Form::hidden('work_id', $work_id) !!}

                            <p class="works_show_blok_title">
                                Класс {{$grade->name}}<br>
                                <a href="{{route('indexIndividually', ['id'=>$work_id])}}">
                                    Веруться к выбору класса
                                </a>
                            </p>
                            <div class="form-group{{ $errors->has('schoolkid_id') ? ' has-error' : '' }}">
                                <label for="schoolkid_id" class="col-md-4 control-label">Ученик</label>

                                <div class="col-md-6">
                                    <select name="schoolkid_id" class="form-control" id="schoolkid_id" required>
                                        <option selected="selected" value="">Выберите ученика...</option>
                                        @foreach($schoolkids as $schoolkid)
                                            <option value={{$schoolkid->id}}>
                                                {{$schoolkid->id}}
                                                {{$schoolkid->lastname}}
                                                {{$schoolkid->firstname}}
                                                {{$schoolkid->middlename}}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('schoolkid_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('schoolkid_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br><br>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Дата</label>

                                <div class="col-md-6">
                                    {!! Form::text('date', old('date'), ['required',
                                    'class'=>'form-control',
                                    'placeholder' => 'ГГГГ-ММ-ДД'
                                    ]) !!}

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div><br><br>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {!! Form::submit('Назначить работу', ['class'=>'btn btn-primary']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}<br>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
