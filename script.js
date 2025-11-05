/*
FILE: script.js
Deskripsi: Validasi sederhana sesuai instruksi latihan kuis.
- Validasi Email: tidak boleh kosong
- Validasi Password: minimal 8 karakter
- Jika lolos: tampilkan alert sukses dan kosongkan form
*/

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('registrationForm');

  if (!form) return; // safety check bila file dibuka sendiri

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const emailEl = document.getElementById('email');
    const passwordEl = document.getElementById('password');

    const email = emailEl ? emailEl.value.trim() : '';
    const password = passwordEl ? passwordEl.value : '';

    // 1. Validasi Email Tidak Boleh Kosong
    if (email === '') {
      alert('Alamat Email tidak boleh kosong!');
      if (emailEl) emailEl.focus();
      return;
    }

    // 2. Validasi Janjang Password Min. 8
    if (password.length < 8) {
      alert('Password harus terdiri dari minimal 8 karakter.');
      if (passwordEl) passwordEl.focus();
      return;
    }

    // 3. Pemberitahuan Lolos Validasi
    alert('Pendaftaran berhasil! Terima kasih.');

    // 4. Reset untuk Kosongkan Form
    form.reset();
  });
});