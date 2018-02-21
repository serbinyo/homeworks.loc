@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создать работу</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/works/">Список работ</a> >>
                        Создать работу
                        <br><br>


                        {!! Form::open(['url'=>route('works.store'),'method'=>'post', 'class'=>'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('theme') ? ' has-error' : '' }}">
                                {!! Form::label('theme', 'Тема', ['class'=>'col-md-4 control-label']) !!}

                                <div class="col-md-6">
                                    {!! Form::text('theme', old('theme'), ['required','class'=>'form-control']) !!}

                                    @if ($errors->has('theme'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('theme') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Создать работу', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
