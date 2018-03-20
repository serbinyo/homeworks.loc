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
                        <br><br>

                        @if(($teachers->count() === 0))
                            <p class="works_show_blok_title">
                                Учителей по предмету нет
                            </p>
                        @else
                            <? $i = 0 ?>
                            @foreach($teachers as $teacher)

                                Порядковый номер: {{++$i}}
                                ID: {{$teacher->id }}
                                ФИО: {{$teacher->lastname }}
                                {{$teacher->firstname}}
                                {{$teacher->middlename}}<br>

                            @endforeach
                        @endif


                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
