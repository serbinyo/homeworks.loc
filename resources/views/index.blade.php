@extends('layouts.main-layout')

@section('content')

    <section>
        <div class="main_lable">
            <a href="/">
                Клиентское приложение для работы с базой данных Спортивный клуб
            </a>
        </div>
        <table class="ava_table">
            <tbody>
            <tr>
                <td>
                    <img src="/public/img/dhw.jpg" width="250" alt=""/>
                </td>
                <td class="lr_column">
                    <h3>
                        Система электронных домашних заданий<br>
                        для средних общеобразовательных школ<br>
                    </h3>
                    <div class="to_right">
                        <p>
                            <strong>
                                Курсовой проект<br>
                            </strong>
                        </p>
                        <p>
                            Веб-программирование
                        </p>
                        <p>
                            группа: ИС/б-41-з
                        </p>
                        <p>
                            Сербин Александр Александрович
                        </p>
                    </div>
                    <p>
                        Декабрь 2017
                    </p>
                </td>
            </tr>
            </tbody>
        </table>

        @if (!$user)
            <div class="enter_area">
                <div class="enter_block">
                    <div id="mybutton"> Войти в программу</div>
                </div>
                <div class="enter_block">
                    <div class="login_form_container" id="login-container">
                        {!! Form::open(['url'=>''])!!}
                        {!! Form::hidden('login') !!}

                        <div class="form-group">
                            {!! Form::label(null, 'Логин: ', ['class'=>'control-label']) !!}
                            <div class="form-element">
                                {!! Form::text('login', null, ['class'=>'inp']) !!}
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="form-group">
                            {!! Form::label(null, 'Пароль: ', ['class'=>'control-label']) !!}
                            <div class="form-element">
                                {!! Form::password('passwd', ['class'=>'inp']) !!}
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Войти', ['class'=>'enter_button', 'name'=>'do-login']) !!}
                            <div class="clr"></div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        @else
            @if($user)
                <div class="enter_area">
                    <div class="hello_label">
                        Вы
                        {{$user->фамилия }}
                        {{$user->имя }}
                        {{$user->отчество }}
                    </div>

                    <table class="hello_table">
                        <tbody>
                        <tr>
                            <td>
                                <a href="menu" class="enter_button">Продолжить</a>
                            </td>
                            <td>
                                {!! Form::open(['url'=>'']) !!}
                                {!! Form::submit('   Выйти  ',['class'=>'enter_button']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endif
        @endif
    </section>
@endsection