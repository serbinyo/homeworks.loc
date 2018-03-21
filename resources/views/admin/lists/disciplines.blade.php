@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Предметы</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/admin">Рабочий стол</a> >>
                        <a href="/admin/lists">Списки</a> >>
                        Предметы
                        <br><br>

                        @foreach($disciplines as $discipline)
                            <div>
                                <a href="{{route('discipline.show', $discipline->id)}}" class="th-float">
                                    {{$discipline->name}}
                                </a>

                                <a href="{{route('discipline.edit', ['id'=>$discipline->id])}}">
                                    <div class="ico_edit"></div>
                                </a>

                                {!! Form::open(['url'=>route('discipline.destroy', ['id'=>$discipline->id])]) !!}
                                {!! Form::submit('', ['class'=>'ico_delete']) !!}
                                {{method_field('DELETE')}}
                                {!! Form::close() !!}
                            </div>
                            <div style="clear: both"></div>
                            <hr>
                        @endforeach
                        {{$disciplines->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
