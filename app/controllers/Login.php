<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('login/index');
    }

    public function processLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Panggil model untuk memeriksa login
        $userModel = $this->model('UserModel');
        $userData = $userModel->getUserByUsernameAndPassword($username, $password);

        if ($userData) {
            // Jika login berhasil, arahkan URL sesuai dengan user_type
            switch ($userData['user_type']) {
                case 'dosen':
                    header('Location: /dosen');
                    break;
                case 'mahasiswa':
                    header('Location: /mahasiswa');
                    break;
                    // Tambahkan case sesuai dengan user_type lainnya
                default:
                    header('Location: /default-url');
                    break;
            }
            exit;
        } else {
            // Jika login gagal, mungkin tampilkan pesan kesalahan atau arahkan kembali ke halaman login
            $this->view('login/index', ['error' => 'Username or password is incorrect.']);
        }
    }
}
