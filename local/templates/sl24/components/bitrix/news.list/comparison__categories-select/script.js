document.addEventListener('DOMContentLoaded', function() {
    const ajaxCompare = (input, rand=false, products) => {
        const ajaxContainer = document.querySelector('#catalogAjax');
        let wait = BX.showWait(ajaxContainer);

        let product1 = (input ? input.dataset.product_1 : '');
        let product2 = (input ? input.dataset.product_2 : '');
        products = (products ? products : [product1, product2]);

        $.ajax({
            url: location.pathname,
            data: {
                products: products,
                rand: rand
            },
            type: 'POST',
            cache: false,
            dataType: "html",
            success: function(dataHtml){
                ajaxContainer.innerHTML = dataHtml;
                window.SL_API.initializeComparisonSelects();
                randomEvent();
                selectEvent();

                BX.closeWait(ajaxContainer, wait); // прячем прелоадер
            }
        });
    };

    // предустановленные фильтра
    const comparisonSelects = Array.from(document.querySelectorAll('.js-comparison-select'));
    comparisonSelects.forEach(element => {
        const radio = Array.from(element.querySelectorAll('.comparison__categories-checkbox'));

        let checkedRadio = radio.find(item => {
            const input = item.querySelector('input[type="radio"]');

            return input.checked;
        });
        if (checkedRadio){
            console.log(checkedRadio.querySelector('input[type="radio"]'));
            ajaxCompare(checkedRadio.querySelector('input[type="radio"]'));
        }

        radio.forEach(item => {
            const input = item.querySelector('input[type="radio"]');

            input.addEventListener('change', () => {
                ajaxCompare(input);
            });
        });
    });

    // случайные модели
    const randomEvent = (input) => {
        const random = document.querySelector('button.comparison__random-products-btn');
        random.addEventListener('click', () => {
            ajaxCompare('', true);
        });
    };

    // конкретный выбор
    const selectEvent = (input) => {
        const options = Array.from(document.querySelectorAll('label.comparison__product-select-checkbox'));

        options.forEach(item => {
            const input = item.querySelector('input[type="radio"]');

            input.addEventListener('change', () => {
                let product_1 = document.querySelector('input[name="comparison-a"]:checked').value;
                let product_2 = document.querySelector('input[name="comparison-b"]:checked').value;

                if (product_1 != product_2){
                    ajaxCompare('', false, [product_1, product_2]);
                }
                else{
                    alert("Необходимо выбрать разные модели.");
                }
            });
        });
    };

    // полное сравнение
    const comparison = document.querySelector('.js-full-comparison');
    comparison.addEventListener('click', (event) => {
        event.preventDefault();
        let splitId = $('[data-comparise]').data('comparise');
        let arId = splitId.split(",");

        function clearAll()
        {
            return new Promise((resolve, reject) => {
                BX.ajax.runAction('sl:core.api.fullcompare.clear', {
                    data: {
                        arId: arId
                    }
                }).then(function (response) {
                    console.log(response);
                    resolve("Успех");
                }, function (response) {
                    console.log(response);
                    reject("Ошибка");
                });
            });
        }

        const promise = clearAll();
        promise.then(addItems);

        function addItems(){
            console.log(arId);
            arId.forEach(id => {
                let url = '/compare/?action=ADD_TO_COMPARE_LIST&ajax_action=Y&id=' + id;
                $.get(url, function (data) {
                    console.log(data);
                });
            });

            location.href = "/compare/";
        }
    });
})