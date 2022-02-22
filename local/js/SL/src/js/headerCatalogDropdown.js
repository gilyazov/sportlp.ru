export default function headerCatalogDropdown() {
    const elements = Array.from(document.querySelectorAll('.page-header__catalog'));

    elements.forEach(element => {
        const btns = Array.from(element.querySelectorAll('.page-header__catalog-dropdown-nav-link'));
        const items = Array.from(element.querySelectorAll('.page-header__catalog-dropdown-nav-list-item'));
        const tabs = Array.from(element.querySelectorAll('.page-header__catalog-dropdown-tabs-item'));

        const setActiveTab = index => {
            btns.forEach(btn => {
                btn.parentElement.classList.remove('active');
            });
            tabs.forEach(tab => tab.classList.remove('active'));

            btns[index].parentElement.classList.add('active');
            tabs[index].classList.add('active');
        };

        setActiveTab(0);

        items.forEach((item, itemIndex) => {
            item.addEventListener('click', event => {
                event.preventDefault();
                setActiveTab(itemIndex);
            });
            item.addEventListener('mouseover', event => {
                event.preventDefault();
                setActiveTab(itemIndex);
            });
        });
    });
}
