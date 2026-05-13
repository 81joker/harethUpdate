document.addEventListener('DOMContentLoaded', function() {
    let lastTranslateX = 0, lastTranslateY = 0;
    let img = null;
    const zoom = 2;
    const scrollStep = 0.2;

    function clamp(val, min, max) {
        return Math.max(min, Math.min(max, val));
    }

    function getMaxTranslate(img) {
        if (!img) return {x: 0, y: 0};
        const parent = img.parentElement;
        const iw = img.naturalWidth;
        const ih = img.naturalHeight;
        const pw = parent.offsetWidth;
        const ph = parent.offsetHeight;
        const zw = iw * zoom;
        const zh = ih * zoom;
        const x = Math.max(0, (zw - pw) / 2);
        const y = Math.max(0, (zh - ph) / 2);
        return {x, y};
    }

    function applyTransform(x, y) {
        const max = getMaxTranslate(img);
        const maxY = max.y * 0.19; // Limit Y-axis movement to 20% of max
        x = clamp(x, -max.x, max.x);
        y = clamp(y, -maxY, maxY);
        
        img.style.transform = `scale(${zoom}) translate(${x}px, ${y}px)`;
        lastTranslateX = x;
        lastTranslateY = y;
    }

    document.body.addEventListener('click', function(e) {
        if (e.target.matches('#baguetteBox-overlay .full-image img')) {
            e.target.classList.toggle('zoomed');
            if (!e.target.classList.contains('zoomed')) {
                e.target.style.transform = '';
                lastTranslateX = 0;
                lastTranslateY = 0;
            } else {
                img = e.target;
                applyTransform(0, 0);
            }
        }
    });

    // Only keep wheel event for scrolling
    document.body.addEventListener('wheel', function(e) {
        if (e.target.matches('#baguetteBox-overlay .full-image img.zoomed') || 
            (img && img.classList.contains('zoomed'))) {
            if (!img) img = e.target;
            let x = lastTranslateX - e.deltaX * scrollStep;
            let y = lastTranslateY - e.deltaY * scrollStep;
            applyTransform(x, y);
            e.preventDefault();
        }
    }, {passive: false});
});