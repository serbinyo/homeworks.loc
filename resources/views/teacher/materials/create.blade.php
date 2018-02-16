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
                        @include('common.errors')
                        Добавить дополнительный учебный материал!<br><br>

                        Форма добавления<br><br>

                        {!! Form::open(['url'=>route('materials.store'),'method'=>'post']) !!}

                        {!! Form::label('theme', 'Тема:') !!}<br>
                        {!! Form::text('theme', '',['required']) !!}<br>

                        {!! Form::label('image', 'Изображние:') !!}<br>
                        {!! Form::text('image', '',['required']) !!}<br>

                        {!! Form::label('title', 'Заголовок:') !!}<br>
                        {!! Form::text('title', '')!!}<br>

                        {!! Form::label('body', 'Основной текст:') !!}<br>
                        {!! Form::textarea('body', '',['required']) !!}<br>

                        {!! Form::submit('Сохранить новый материал', ['class'=>'']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
