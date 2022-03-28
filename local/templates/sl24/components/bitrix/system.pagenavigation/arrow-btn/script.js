$(document).ready(function(){

    $(document).on('click', '.js-load_more', function(e){
        e.preventDefault();
        var targetContainer = $('.realised-projects__list'),          //  Контейнер, в котором хранятся элементы
            url =  $('.js-load_more').attr('data-url');    //  URL, из которого будем брать элементы

        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){

                    //  Удаляем старую навигацию
                    $('.js-load_more').remove();

                    var elements = $(data).find('.realised-projects__list-item'),  //  Ищем элементы
                        pagination = $(data).find('.js-load_more');//  Ищем навигацию

                    targetContainer.append(elements);   //  Добавляем посты в конец контейнера
                    targetContainer.append(pagination); //  добавляем навигацию следом
                    window.SL_API.intializeProjectsSliders();
                }
            })
        }

    });

});