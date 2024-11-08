// Menangani event klik pada ikon
document.querySelector('.btn-link').addEventListener('click', function() {
    this.classList.toggle('liked'); // Menambahkan atau menghapus kelas 'liked'
});