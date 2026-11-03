/**
 * =========================================================
 * BARANG.JS - JavaScript Khusus Halaman Barang
 * File: public/js/pages/barang.js
 * =========================================================
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Live Image Preview untuk Input File Gambar
    const gambarInput = document.getElementById('gambarInput');
    const previewContainer = document.getElementById('previewContainer');
    const previewImg = document.getElementById('previewImage');

    if (gambarInput && previewContainer && previewImg) {
        gambarInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                // Validasi tipe file
                if (!file.type.startsWith('image/')) {
                    alert('File yang dipilih harus berupa gambar (JPG, PNG, WebP)!');
                    gambarInput.value = '';
                    previewContainer.style.display = 'none';
                    return;
                }

                // Validasi ukuran file (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal adalah 2MB!');
                    gambarInput.value = '';
                    previewContainer.style.display = 'none';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        });
    }

    // 2. Konfirmasi Hapus Barang
    const deleteForms = document.querySelectorAll('form.form-delete-barang');
    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            const barangNama = form.getAttribute('data-nama') || 'barang ini';
            const confirmed = confirm(`Apakah Anda yakin ingin menghapus "${barangNama}"? Tindakan ini tidak dapat dibatalkan.`);
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });
});
