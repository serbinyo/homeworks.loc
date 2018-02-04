@extends('layouts.app')

@section('content')

    <section>
        <div class="main_lable">
            <a href="/">
                Система электронных домашних заданий. Сербин А
            </a>
        </div>
        <table class="hello_table">
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

        @if($user)
            <div class="enter_area">
                <div class="hello_label">
                    Вы
                    {{ $user->login }}
                    {{--{{$user->фамилия }}
                    {{$user->имя }}
                    {{$user->отчество }}--}}
                </div>

                <table class="hello_table">
                    <tbody>
                    <tr>
                        <td>
                            @if ($user->role == 't')
                                <a href="teacher/worktop" style="text-decoration: none" class="enter_button">В учительскую</a>
                            @else
                                <a href="desktop" style="text-decoration: none" class="enter_button">За уроки</a>
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['url'=>route('logout')]) !!}
                            {!! Form::submit('   Выйти  ',['class'=>'enter_button']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="enter_area">
                <div class="enter_block">
                    <a href="login" style="text-decoration: none">
                        <div id="mybutton"> Войти в программу</div>
                    </a>
                </div>
            </div>
        @endif


    </section>
@endsection