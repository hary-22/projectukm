/**
 * =========================================================
 * PROFILE.JS - JavaScript Khusus Halaman Profile
 * File: public/js/pages/profile.js
 * =========================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    const profileForm = document.getElementById('profileForm');
    const passwordInput = document.getElementById('new_password');
    const passwordConfirmInput = document.getElementById('new_password_confirmation');

    if (profileForm && passwordInput && passwordConfirmInput) {
        profileForm.addEventListener('submit', function (e) {
            if (passwordInput.value.length > 0) {
                if (passwordInput.value.length < 6) {
                    e.preventDefault();
                    alert('Password baru minimal 6 karakter!');
                    passwordInput.focus();
                    return;
                }

                if (passwordInput.value !== passwordConfirmInput.value) {
                    e.preventDefault();
                    alert('Konfirmasi password baru tidak cocok!');
                    passwordConfirmInput.focus();
                    return;
                }
            }
        });
    }
});
