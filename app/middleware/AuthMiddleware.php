<?php

class AuthMiddleware extends Controller
{
    public function handle()
    {
        // Periksa apakah user_id dan user_type ada pada session
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type'])) {
            // Jika tidak ada, arahkan ke halaman login
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // Jika user sudah login, lanjutkan ke halaman yang diminta
    }
}
