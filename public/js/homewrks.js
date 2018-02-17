jQuery(document).ready(function ($) {

    //обработчик для формы добавления НОВОЙ записи
    $('#addform').on('click', '#addform-submit', function (e) {
        e.preventDefault();
        //информация о происходящем в ассинхронном запросе для пользователя
        $('.wrap_result').css('color', 'green').text('Сохранение').fadeIn(500, function () {
            //плавно показываем блок(500мс), затем выполняем функцию

            data = $('#addform').serializeArray();

            $.ajax(
                {
                    url: $('#addform').attr('action'),
                    data: data,
                    type: 'POST',
                    headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    datatype: 'JSON',
                    success: function (html) {
                        if (html.errors) {
                            $('.wrap_result').css('color', 'red').append('<br/><strong>Заполните все поля</strong>').delay(900).fadeOut(500);
                        }
                        else if (html.success) {
                            $('.wrap_result').css('color', 'blue').append('<br/><strong>Cохранено успешно</strong>').delay(900).fadeOut(500);
                        }
                    },
                    error: function () {
                        $('.wrap_result').css('color', 'red').append('<br/><strong>Ошибка</strong>').delay(900).fadeOut(500);
                    }
                });
        });
    });
});