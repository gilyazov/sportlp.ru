export default function productTabs() {
    const elements = Array.from(document.querySelectorAll('.js-product-tabs'));

    elements.forEach(element => {
        const tabBtns = Array.from(element.querySelectorAll('.product-details__tabs-nav-link'));
        const tabItems = Array.from(element.querySelectorAll('.product-details__tab-item'));

        const setActiveTab = index => {
            tabBtns.forEach(btn => btn.classList.remove('active'));
            tabItems.forEach(item => item.classList.remove('active'));

            tabBtns[index].classList.add('active');
            tabItems[index].classList.add('active');
        }
        

        if (tabItems.length) {
            setActiveTab(0);
        }

        tabBtns.forEach((btn, btnIndex) => {
            btn.addEventListener('click', event => {
                event.preventDefault();
                setActiveTab(btnIndex);
            } )
        })
    });
}
