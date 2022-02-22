export default function catalog() {
    const elements = Array.from(document.querySelectorAll('.js-catalog'));

    elements.forEach(element => {
        const btns = Array.from(element.querySelectorAll('.catalog__categories-link'));
        const tabs = Array.from(element.querySelectorAll('.catalog__tab-item'));

        const setActiveItem = index => {
            btns.forEach(btn => btn.classList.remove('active'));
            tabs.forEach(tab => tab.classList.remove('active'));

            btns[index].classList.add('active');
            tabs[index].classList.add('active');
        };

        setActiveItem(0);

        btns.forEach((btn, btnIndex) => {
            btn.addEventListener('click', event => {
                event.preventDefault();
                setActiveItem(btnIndex);
            });
        });
    });
}
