@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Учащиеся</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/lists">Списки</a> >>
                        Учащиеся
                        <hr>
                        <br>

                        @foreach($schoolkids as $schoolkid)

                            {{$schoolkid->lastname }}
                            {{$schoolkid->firstname}}
                            {{$schoolkid->middlename}},
                            Класс:
                            <a href="{{route('grades.show', $schoolkid->grade->id)}}">
                                {{$schoolkid->grade->name}}
                            </a>,
                            Логин: {{$schoolkid->user->login}}

                            <hr>

                        @endforeach
                        {{$schoolkids->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection