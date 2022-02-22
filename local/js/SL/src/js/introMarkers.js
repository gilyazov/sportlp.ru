export default function introMarkers() {
    const markers = Array.from(document.querySelectorAll('.intro__slider-card-illustration-item'));

    markers.forEach(marker => {
        const btn = marker.querySelector('.intro__slider-card-illustration-item-marker');

        btn.addEventListener('click', event => {
            event.preventDefault();

            markers.forEach(otherMarker => {
                if (otherMarker !== marker) {
                    otherMarker.classList.remove('open');
                }
            });

            marker.classList.toggle('open');
        });
    });

    document.addEventListener('click', event => {
        if (!(event.target.matches('.intro__slider-card-illustration-item') || event.target.closest('.intro__slider-card-illustration-item'))) {
            markers.forEach(marker => marker.classList.remove('open'));
        }
    });
}
