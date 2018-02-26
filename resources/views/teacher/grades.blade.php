@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Классы!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        Классы
                        <br><br>

                        {!! Form::open(['url'=>route('grades.show', ['method'=>'get']),
                        'class'=>'form-horizontal',
                        'method' => 'GET'])
                        !!}

                        <div class="form-group">
                            <label for="grade_id" class="col-md-4 control-label">Класс</label>

                            <div class="col-md-6">
                                <select name="grade_id" class="form-control" id="grade_id" required>
                                    <option selected="selected" value="">Выберите класс...</option>
                                    @foreach($grades as $grade)
                                        <option value={{$grade->id}} >
                                            {{$grade->name}}
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


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
