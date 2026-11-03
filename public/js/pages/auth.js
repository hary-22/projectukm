/**
 * =========================================================
 * AUTH.JS - JavaScript Khusus Halaman Login & Register
 * File: public/js/pages/auth.js
 * =========================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    // Toggle Password Visibility
    const toggleButtons = document.querySelectorAll('.password-toggle-btn');

    toggleButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const targetInputId = this.getAttribute('data-target');
            const targetInput = document.getElementById(targetInputId);
            const icon = this.querySelector('i');

            if (targetInput) {
                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    if (icon) {
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    }
                } else {
                    targetInput.type = 'password';
                    if (icon) {
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                }
            }
        });
    });
});
