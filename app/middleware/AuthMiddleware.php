<?php

class AuthMiddleware extends Controller
{
    public function handle()
    {
        // Periksa apakah user_id dan user_type ada pada session
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type'])) {
            // Jika tidak ada, arahkan ke halaman login
            $this->showSweetAlert('error', 'Gagal', 'Anda Belum Login, Silahkan Login Terlebih Dahulu');
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // Jika user sudah login, lanjutkan ke halaman yang diminta
    }
}
