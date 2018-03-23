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

                                <a href="{{route('grade.show', $grade->id)}} ">
                                    {{$grade->num}}
                                    -
                                    {{$grade->char}}
                                </a>

                            <hr>
                        @endforeach
                        {{$grades->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
