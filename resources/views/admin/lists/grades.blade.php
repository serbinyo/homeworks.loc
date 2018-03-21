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
                            <div>
                                <a href="{{route('grade.show', $grade->id)}} " class="th-float">
                                    {{$grade->num}}
                                    -
                                    {{$grade->char}}
                                </a>

                                <a href="{{route('grade.edit', ['id'=>$grade->id])}}">
                                    <div class="ico_edit"></div>
                                </a>

                                {!! Form::open(['url'=>route('grade.destroy', ['id'=>$grade->id])]) !!}
                                {!! Form::submit('', ['class'=>'ico_delete']) !!}
                                {{method_field('DELETE')}}
                                {!! Form::close() !!}
                                <div style="clear: both"></div>
                            </div>
                            <hr>
                        @endforeach
                        {{$grades->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
