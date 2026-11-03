/**
 * =========================================================
 * APP.JS - JavaScript Global Sistem
 * File: public/js/app.js
 * =========================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Auto-dismiss alerts setelah 5 detik
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(function (alert) {
        setTimeout(function () {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            if (bsAlert) {
                bsAlert.close();
            }
        }, 5000);
    });

    // 2. Global confirmation helper untuk form dengan class .confirm-action
    const confirmForms = document.querySelectorAll('form.confirm-action');
    confirmForms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            const message = form.getAttribute('data-confirm-message') || 'Apakah Anda yakin ingin melakukan tindakan ini?';
            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });
});
