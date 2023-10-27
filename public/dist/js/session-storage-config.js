$(window).on('beforeunload', function() {
    // Cek apakah pengguna akan pindah ke halaman lain yang bukan halaman 'news'
    if (!window.location.href.includes('/news')) {
        // Hapus `sessionStorage.selectedNews` jika tujuan bukan halaman 'news'
        sessionStorage.removeItem("selectedNews");
    }
});

