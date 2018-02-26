@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Классы: {{$grade->name}}
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
                        <a href="/teacher/lists/grades/">Классы</a> >>
                        {{$grade->name}}
                        <br><br>

                        @if(($schoolkids->count() === 0))
                            <p class="works_show_blok_title">
                                В классе пока нет учащихся
                            </p>
                        @else
                            <? $i = 0 ?>
                            @foreach($schoolkids as $schoolkid)

                                {{++$i}}
                                {{$schoolkid->lastname}}
                                {{$schoolkid->firstname}}
                                {{$schoolkid->middlename}}<br>

                            @endforeach
                        @endif


                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
