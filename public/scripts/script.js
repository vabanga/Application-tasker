$( document ).ready(function() {
    //Валидация формы
    $.validate({
        lang: 'en'
    });
    $('#name').restrictLength( $('#name-max-length') );
    $('#email').restrictLength( $('#email-max-length') );
    $('#text').restrictLength( $('#text-max-length') );

    //Скрипт для показа выбранного файла
    $('#create_form').find('input[type=file]').change(function () {
        var str1 = $("input[type=file]").val();
        var str2 = 'C:\\fakepath\\';
        var cleanStr = str1.replace(str2, '');
        $("label[for=customFile]").text(cleanStr);
    });

    //Скрипт для отчичски tmp
    $('.close').click(function () {
        $.ajax({
            type: "POST",
            url: "/public/preview.php",
            data: { "clean": "clean" },
            cache: false
        });
    });

    //Превью задачи
    $("#prev").click(function (e) {
        var name = $("input[name=name]").val().length;
        var email = $("input[name=email]").val().length;
        var text = $("textarea[name=text]").val().length;


        if(name !== 0 && email !== 0 && text !== 0)
        {
            var formData = new FormData();

            if(($('#file')[0].files).length != 0)
            {

                $.each($('#file')[0].files, function (i, file) {
                    formData.append("file", file);
                })
            }

            var form = {};
            // переберём все элементы input, textarea и select формы с id="myForm "
            $('#create_form').find('input, textarea').each(function() {
                // добавим новое свойство к объекту $data
                // имя свойства – значение атрибута name элемента
                // значение свойства – значение свойство value элемента
                form[this.name] = $(this).val();
                formData.append(this.name, $(this).val());
            });
            formData.append("prev", 1);

            $.ajax({
                type: "POST",
                url: "/public/preview.php",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function (data) {
                    $(".mdl").html(data);
                }
            });
            $('#modal').modal('show');

            return false;
        }
        else
        {
            if(name === 0)
            {
                $("input[name=name]").css("border", "1px solid red");
            }
            if(email === 0)
            {
                $("input[name=email]").css("border", "1px solid red");
            }
            if(text === 0)
            {
                $("textarea[name=text]").css("border", "1px solid red");
            }
            return false;
        }




    });
});