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

                        <a href="/admin">Рабочий стол</a> >>
                        <a href="/admin/lists">Списки</a> >>
                        Предметы
                        <br><br>

                        {!! Form::open(['url'=>route('disciplineView'),
                        'class'=>'form-horizontal',
                        'method' => 'GET'])
                        !!}

                        <div class="form-group">
                            <label for="discipline_id" class="col-md-4 control-label">Дисциплина</label>

                            <div class="col-md-6">
                                <select name="discipline_id" class="form-control" id="discipline_id" required>
                                    <option selected="selected" value="">Выберите предмет...</option>
                                    @foreach($disciplines as $discipline)
                                        <option value={{$discipline->id}} >
                                            {{$discipline->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Выбрать', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}<br>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
