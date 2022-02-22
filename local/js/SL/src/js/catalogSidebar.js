import './resizeSensor';
import StickySidebar from 'sticky-sidebar';

export default function catalogSidebar() {
    const sidebar = document.querySelector('.js-catalog-sticky-sidebar');

    if (!sidebar) return;

    const sidebarInstance = new StickySidebar(sidebar, {
        topSpacing: document.querySelector('.page-header').offsetHeight + 10,
        bottomSpacing: 20,
        containerSelector: '.catalog-page__layout',
        innerWrapperSelector: '.catalog-page__sidebar-inner',
        minWidth: 641
    });

    const elementToObserve = document.querySelector('.catalog-page__results-list');

    // create a new instance of `MutationObserver` named `observer`,
    // passing it a callback function
    const observer = new MutationObserver(function() {
        sidebarInstance.updateSticky();
    });

    // call `observe()` on that MutationObserver instance,
    // passing it the element to observe, and the options object
    observer.observe(elementToObserve, { subtree: false, childList: true });
}
