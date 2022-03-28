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

                ajaxCompare('', false, [product_1, product_2]);
            });
        });
    };

})