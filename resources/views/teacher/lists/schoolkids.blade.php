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
                            @include('common.errors')

                        <a href="/teacher">Учительская</a> >>
                        <a href="/teacher/lists">Списки</a> >>
                        Учащиеся
                        <hr>

                        @foreach($schoolkids as $schoolkid)

                            {{$schoolkid->lastname }}
                            {{$schoolkid->firstname}}
                            {{$schoolkid->middlename}},
                            <a href="{{route('gradeShow', $schoolkid->grade->id)}}">
                                {{$schoolkid->grade->num}}
                                -
                                {{$schoolkid->grade->char}}
                            </a>
                            <hr>

                        @endforeach
                        {{$schoolkids->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
