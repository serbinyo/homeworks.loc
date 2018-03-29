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
                        @include('common.errors')

                        <a href="/admin">Рабочий стол</a> >>
                        <a href="/admin/lists">Списки</a> >>
                        Учителя
                        <hr>
                        <br>

                        @foreach($teachers as $teacher)

                            <a href="{{route('teach.show', $teacher->id)}}">
                                {{$teacher->lastname }}
                                {{$teacher->firstname}}
                                {{$teacher->middlename}}
                            </a>
                            ,
                            <a href="{{route('discipline.show', $teacher->discipline->id)}}">
                                {{$teacher->discipline->name}}
                            </a>

                            <hr>

                        @endforeach
                        {{$teachers->links()}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
