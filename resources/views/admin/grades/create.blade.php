@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление класса</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->has('duplicated'))
                            <div class="alert alert-danger">
                                <div class="message js-form-message">
                                    <strong>{{ $errors->first('duplicated') }}</strong>
                                </div>
                            </div>
                        @endif


                        <a href="/admin">Рабочий стол</a> >>
                        Добавление класса
                        <br><br>

                        <form class="form-horizontal" method="POST" action="{{ route('grade.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('num') ? ' has-error' : '' }}">
                                <label for="num" class="col-md-4 control-label">Класс, цифра:</label>

                                <div class="col-md-6">
                                    {{--<input id="num" type="text" class="form-control" name="num"--}}
                                    {{--autofocus>--}}
                                    <select name="num" class="form-control" id="num" required>
                                        <option selected="selected" value="">Выберите цифру...</option>
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
                                           required>

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
                                              placeholder="Не обязательно"></textarea>

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
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
