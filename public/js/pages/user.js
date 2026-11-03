/**
 * =========================================================
 * USER.JS - JavaScript Khusus Halaman User (Admin)
 * File: public/js/pages/user.js
 * =========================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Validasi kecocokan password sebelum submit form
    const userForm = document.getElementById('userForm');
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirmation');

    if (userForm && passwordInput && passwordConfirmInput) {
        userForm.addEventListener('submit', function (e) {
            if (passwordInput.value && passwordInput.value !== passwordConfirmInput.value) {
                e.preventDefault();
                alert('Konfirmasi password tidak cocok dengan password yang dimasukkan!');
                passwordConfirmInput.focus();
            }
        });
    }

    // 2. Konfirmasi Hapus User
    const deleteForms = document.querySelectorAll('form.form-delete-user');
    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            const userName = form.getAttribute('data-nama') || 'user ini';
            const confirmed = confirm(`Apakah Anda yakin ingin menghapus akun "${userName}"?`);
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
});
