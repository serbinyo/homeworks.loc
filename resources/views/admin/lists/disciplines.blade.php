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

                            <a href="{{route('discipline.show', $discipline->id)}}">
                                {{$discipline->name}}
                            </a>

                            <hr>
                        @endforeach
                        {{$disciplines->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
