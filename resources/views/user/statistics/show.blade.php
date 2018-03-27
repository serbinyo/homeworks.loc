@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Статистика. Выбор предмета</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/desktop">Рабочий стол</a> >>
                        <a href="/statistics">Статистика</a> >>
                        {{ $discipline->name }}
                        <hr>

                        <p>
                            Статистика по предмету {{$discipline->name}}:
                        </p>
                        <p>
                            Всего домашних заданий:
                            {{$homeworks_count}}
                        </p>
                        <p>
                            Процент сданных работ:
                            {{$done_percent}} %
                        </p>
                        <p>
                            Средний балл:
                            {{$average_percent}} %
                        </p>
                        <p>
                            Средняя оценка:
                            {{$average_mark}}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
