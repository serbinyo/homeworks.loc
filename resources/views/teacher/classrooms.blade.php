@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Учительская</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Классы!<br>

                    <a  href="/teacher/classrooms/teachereg">Зарегистрировать учителя</a><br>
                    <a  href="/teacher/classrooms/usereg">Зареистрировать ученика</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
