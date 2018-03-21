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
                        <a href="/admin/lists/grades/">Классы</a> >>
                        {{$grade->num}}
                        -
                        {{$grade->char}}
                        <br><br>

                        <? $i = 0 ?>
                        @foreach($schoolkids as $schoolkid)

                            Порядковый номер: {{++$i}}
                            ID: {{$schoolkid->id }}
                            ФИО: {{$schoolkid->lastname}}
                            {{$schoolkid->firstname}}
                            {{$schoolkid->middlename}}<br>

                        @endforeach
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
