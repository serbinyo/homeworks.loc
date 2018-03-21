@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Классы</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/admin">Рабочий стол</a> >>
                        <a href="/admin/lists">Списки</a> >>
                        Классы
                        <br><br>


                        @foreach($grades as $grade)
                            <a href="{{route('grade.show', $grade->id)}}">
                                {{$grade->num}}
                                -
                                {{$grade->char}}
                            </a>
                            <br>
                            <a href="{{route('grade.edit', ['id'=>$grade->id])}}">Изменить</a><br>

                            {!! Form::open(['url'=>route('grade.destroy', ['id'=>$grade->id])]) !!}
                            {!! Form::submit('Удалить', ['class'=>'']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}

                            <hr>
                        @endforeach
                        {{$grades->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
