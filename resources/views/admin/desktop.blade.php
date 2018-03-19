@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Админипстротор. Рабочий стол</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <a href="/admin/register">Зарегистрировать учителя</a><br>
                        <a href="/admin/register/user">Зареистрировать ученика</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
