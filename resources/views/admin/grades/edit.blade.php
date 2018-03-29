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
                        <a href="/admin/lists/grades">Классы</a> >>
                        <a href="{{route('grade.show', $grade->id)}}">
                            {{$grade->num}}
                            -
                            {{$grade->char}}
                        </a> >>
                        Редактирование
                        <br><br>

                        <form class="form-horizontal" method="POST" action="{{ route('grade.update', $grade->id) }}">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="form-group{{ $errors->has('num') ? ' has-error' : '' }}">
                                <label for="num" class="col-md-4 control-label">Класс, цифра:</label>

                                <div class="col-md-6">

                                    <select name="num" class="form-control" id="num" required>
                                        <option selected="selected" value="{{$grade->num}}">{{$grade->num}}</option>
                                        @for ($num = 1; $num <= 11; $num++)
                                            <option value={{$num}} >
                                                {{$num}}
                                            </option>
                                        @endfor
                                    </select>

                                    @if ($errors->has('num'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('num') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('char') ? ' has-error' : '' }}">
                                <label for="char" class="col-md-4 control-label">БУКВА</label>

                                <div class="col-md-6">
                                    <input id="char" type="text" class="form-control" name="char"
                                           value="{{$grade->char}}" required>

                                    @if ($errors->has('char'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('char') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Описание</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description"
                                              placeholder="Не обязательно">{{$grade->description}}
                                    </textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Редактировать
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
