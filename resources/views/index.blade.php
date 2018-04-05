@extends('layouts.app')

@section('content')
    <div class="container">

        <section>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @include('common.errors')

            {{--todo обернуть в bootstrap шаблон как на остальных страничках--}}

            <div class="main_lable">
                <a href="/">
                    Система электронных домашних заданий. Сербин Александр
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
                            2017 - 2018
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            @if($user)
                <div class="enter_area">
                    <div class="hello_label">
                        @if ($user->role == 't')
                            Учитель
                            {{ $user->teacher->lastname }}
                            {{ $user->teacher->firstname }}
                        @elseif ($user->role == 's')
                            Учащийся
                            {{ $user->schoolkid->lastname }}
                            {{ $user->schoolkid->firstname }}
                        @elseif ($user->role == 'a')
                            Администратор
                            {{$user->login}}
                        @endif
                    </div>

                    <table class="hello_table">
                        <tbody>
                        <tr>
                            <td>
                                @if ($user->role == 't')
                                    <a href="/teacher" style="text-decoration: none" class="enter_button">В
                                        учительскую</a>
                                @elseif ($user->role == 's')
                                    <a href="/desktop" style="text-decoration: none" class="enter_button">За уроки</a>
                                @elseif ($user->role == 'a')
                                    <a href="/admin" style="text-decoration: none" class="enter_button">Войти</a>
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
    </div>
@endsection