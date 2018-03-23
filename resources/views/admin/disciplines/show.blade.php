@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Дисциплина: {{$discipline->name}}
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
                        <a href="/admin/lists/disciplines/">Передметы</a> >>
                        {{$discipline->name}}
                        <hr>

                        <div class="center-show-title">
                            <div class="th-float">
                                {{$discipline->name}}
                            </div>

                            <a href="{{route('discipline.edit', ['id'=>$discipline->id])}}">
                                <div class="ico_edit"></div>
                            </a>

                            {!! Form::open(['url'=>route('discipline.destroy', ['id'=>$discipline->id])]) !!}
                            {!! Form::submit('', ['class'=>'ico_delete']) !!}
                            {{method_field('DELETE')}}
                            {!! Form::close() !!}
                        </div>
                        <div style="clear: both"></div>
                        @if($discipline->description)
                            Описание:<br>
                            {{ nl2br($discipline->description) }}
                        @endif
                        <hr>

                        @if(($teachers->count() === 0))
                            <p class="works_show_block_title">
                                Учителей по предмету нет
                            </p>
                        @else
                            Учителя по предмету:<br><br>
                            @foreach($teachers as $teacher)

                                <a href="{{route('teach.show', $teacher->id)}}">
                                    {{$teacher->lastname }}
                                    {{$teacher->firstname}}
                                    {{$teacher->middlename}}
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
