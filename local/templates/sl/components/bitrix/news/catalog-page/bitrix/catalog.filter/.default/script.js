function ajaxFilter(myForm, data) {
    let wait = BX.showWait('xls_container');  // показываем прелоадер в правом верхнем углу контейнер
    if (myForm !== null) {
        let url = location.pathname;

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            cache: false,
            dataType: "html",
            success: function(dataHtml){

                $('#catalogAjax').html(dataHtml);
                window.SL_API.initializeCatalogCardsSliders();
                window.SL_API.comparisonAdd();

                if (data.del_filter){
                    BX.ajax.history.put(null, url);
                }
                else{
                    BX.ajax.history.put(null, url + '?' + data + '&ajax=N');
                }

                BX.closeWait('xls_container', wait); // прячем прелоадер
            }
        });
    }
}

BX.ready(function(){
    let myForm = document.querySelector("[name = arrFilter_form]");
    $('#catalogAjax').on('change', 'input:not(.text-input--small), select', function () {
        let str = $(this).closest('[name = arrFilter_form]').serialize();

        ajaxFilter(myForm, str);
    });

    $('#catalogAjax').on('click', '.catalog-page__reset-btn', function (e) {
        e.preventDefault();

        if ($(this).is('[disabled]'))
            return false;

        let data = BX.ajax.prepareForm(myForm).data;
        data.del_filter = 'Сбросить';

        ajaxFilter(myForm, data);
    });
});