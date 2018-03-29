@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Классы:
                        {{$grade->num}}
                        -
                        {{$grade->char}}
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/admin">Рабочий стол</a> >>
                        <a href="/admin/lists">Списки</a> >>
                        <a href="/admin/lists/grades">Классы</a> >>
                        {{$grade->num}}
                        -
                        {{$grade->char}}
                        <hr>

                        <div class="center-show-title">
                            <div class="th-float">
                                {{$grade->num}}
                                -
                                {{$grade->char}}
                            </div>

                            <a href="{{route('grade.edit', ['id'=>$grade->id])}}">
                                <div class="ico_edit"></div>
                            </a>

                            {!! Form::open(['url'=>route('grade.destroy', ['id'=>$grade->id])]) !!}
                            {!! Form::submit('', ['class'=>'ico_delete']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}
                        </div>

                        <div style="clear: both"></div>
                        @if($grade->description)
                            Описание:<br>
                            {{ nl2br($grade->description) }}
                        @endif

                        <hr>

                        @if(($schoolkids->count() === 0))
                            <p class="works_show_block_title">
                                В классе пока нет учеников
                            </p>
                        @else
                            Учащиеся в классе:<br><br>
                            @foreach($schoolkids as $schoolkid)

                                <a href="{{route('kid.show', $schoolkid->id)}}">
                                    {{$schoolkid->lastname}}
                                    {{$schoolkid->firstname}}
                                    {{$schoolkid->middlename}}
                                </a>
                                <hr>

                            @endforeach
                        @endif
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
