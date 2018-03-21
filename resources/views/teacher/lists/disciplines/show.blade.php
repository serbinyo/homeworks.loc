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

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/lists">Списки</a> >>
                        <a href="/teacher/lists/disciplines/">Передметы</a> >>
                        {{$discipline->name}}
                        <br><br>

                            <? $i = 0 ?>
                            @foreach($teachers as $teacher)

                                Порядковый номер: {{++$i}}
                                ID: {{$teacher->id }}
                                ФИО: {{$teacher->lastname }}
                                {{$teacher->firstname}}
                                {{$teacher->middlename}}<br>

                            @endforeach


                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
