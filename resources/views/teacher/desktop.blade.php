@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Учительская <br>
                        Предмет: {{$discipline}}<br>
                        Учитель:
                        {{$teacher->firstname}}
                        {{$teacher->middlename}}
                        {{$teacher->lastname}}<br>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('common.errors')

                        <div id="btn_open">С чего начать?</div>
                        <div id="hiding_block" style='display: none'>
                            <div class="alert alert-warning">
                                <p>Задайте первое домашнее задание!</p>
                                <p>Для этого зайдите в раздел 'Работы' и создайте Новую.</p>
                                <p>Только что созданная работа - это пустой шаблон. Наполните его задачами, тестами,
                                    и, если нужно, дополнительными учебными материалами.</p>
                                <p>Теперь, когда работа включает задачи, тесты, или и то и другое, её можно
                                    задать. Найдите её в разделе Работы и откройте. В нижней части экрана расположенны
                                    кнопки для назначения работы в Домашнее задание - Классу, либо Индивидуально.
                                    Задайте Работу используя их.</p>
                                <p>Готово! Вы задали первое Домашнее задание и освоили основную функцию
                                    приложения. В дальнейшем Вам не придется часто создавать новые работы. Будет
                                    достаточно выбрать подходящую из списка накопившихся работ, созданных
                                    Вами или Вашими коллегами и задать её на дом. Удобно, не правда ли? </p>
                                <p>Следите за выполнением Домашних заданий. Контролируйте выполненные работы и при
                                    необходимости Изменяйте оценку или отправляйте задание На пересдачу.</p>
                                <p style="text-align: right"><i>С ув. А. Сербин</i></p>
                            </div>
                        </div>
                        <br>

                        <a href="{{route('works.index')}}">Работы</a><br><br>

                        <a href="{{route('tasks.index')}}">Задачи</a><br>
                        <a href="{{route('tests.index')}}">Тесты</a><br>
                        <a href="{{route('materials.index')}}">Дополнительные учебные материалы</a><br><br>

                        <a href="/teacher/homeworks">Домашние задания</a><br><br>

                        <a href="{{ route('account.show', $teacher->id) }}">Профайл</a><br>
                        <a href="/teacher/lists">Списки</a><br><br>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
