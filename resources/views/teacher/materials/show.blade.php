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

                        Просмотр дополнительного учебного материала!<br>

                        <a href="{{route('materials.edit', ['id'=>'$material->id'])}}">Изменить</a><br>

                        <a href="{{route('setMaterial', ['id'=>'$material->id'])}}">Назначить материал</a><br>

                        {!! Form::open(['url'=>route('materials.destroy', ['id'=>'$material->id'])]) !!}
                        {!! Form::submit('Удалить', ['class'=>'']) !!}
                        {{method_field('DELETE')}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
