@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Домашние задания</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/teacher">Учительская</a> >>
                        Выбор класса
                        <br><br>

                        {!! Form::open(['url'=>route('hwGradeView'),
                        'class'=>'form-horizontal',
                        'method' => 'POST'])
                        !!}

                        <div class="form-group">
                            <label for="grade_id" class="col-md-4 control-label">Класс</label>

                            <div class="col-md-6">
                                <select name="grade_id" class="form-control" id="grade_id" required>
                                    <option selected="selected" value="">Выберите класс...</option>
                                    @foreach($grades as $grade)
                                        <option value={{$grade->id}} >
                                            {{$grade->num}}
                                            -
                                            {{$grade->char}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Выбрать', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}<br>

                        @foreach($schoolkids as $schoolkid)

                            {{$schoolkid->lastname }}
                            {{$schoolkid->firstname}}
                            {{$schoolkid->middlename}},
                            Класс:
                            <a href="{{route('grades.show', $schoolkid->grade->id)}}">
                                {{$schoolkid->grade->name}}
                            </a>,
                            Логин: {{$schoolkid->user->login}}
                            ID: {{$schoolkid->id }}

                            <hr>

                        @endforeach
                        {{$schoolkids->links()}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
