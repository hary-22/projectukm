/**
 * =========================================================
 * DASHBOARD.JS - JavaScript Khusus Halaman Dashboard
 * File: public/js/pages/dashboard.js
 * =========================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    // Counter Animation untuk angka statistik
    const counters = document.querySelectorAll('.stat-value[data-count]');
    
    counters.forEach(function (counter) {
        const target = +counter.getAttribute('data-count');
        let count = 0;
        const duration = 700; // ms
        const increment = target > 0 ? Math.ceil(target / (duration / 16)) : 0;

        if (target > 0) {
            const updateCount = function () {
                count += increment;
                if (count >= target) {
                    counter.innerText = target.toLocaleString('id-ID');
                } else {
                    counter.innerText = count.toLocaleString('id-ID');
                    requestAnimationFrame(updateCount);
                }
            };
            updateCount();
        } else {
            counter.innerText = '0';
        }
    });
});
