@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Учителя</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/lists">Списки</a> >>
                        Учителя
                        <hr>
                        <br>

                        @foreach($teachers as $teacher)

                            {{$teacher->lastname }}
                            {{$teacher->firstname}}
                            {{$teacher->middlename}},
                            Класс:
                            <a href="{{route('disciplines.show', $teacher->discipline->id)}}">
                                {{$teacher->discipline->name}}
                            </a>,
                            Логин: {{$teacher->user->login}}

                            <hr>

                        @endforeach
                        {{$teachers->links()}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
