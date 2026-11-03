/**
 * =========================================================
 * KATEGORI.JS - JavaScript Khusus Halaman Kategori
 * File: public/js/pages/kategori.js
 * =========================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    // Konfirmasi Hapus Kategori
    const deleteForms = document.querySelectorAll('form.form-delete-kategori');
    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            const kategoriNama = form.getAttribute('data-nama') || 'kategori ini';
            const confirmed = confirm(`Peringatan: Menghapus kategori "${kategoriNama}" mungkin mempengaruhi barang yang terhubung. Lanjutkan?`);
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
});
