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
        $password = md5($_POST['password']);

        // Panggil model untuk memeriksa login        
        $userData = $this->model('User_model')->getUserByUsernameAndPassword($username, $password);

        if ($userData) {

            $_SESSION['user_id'] = $userData['id_user'];
            $_SESSION['user_type'] = $userData['user_type'];

            // Jika login berhasil, arahkan URL sesuai dengan user_type            
            switch ($userData['user_type']) {
                case 'dosen':
                    header('Location: ' . BASEURL . '/dosen');
                    break;
                case 'mahasiswa':
                    header('Location: ' . BASEURL . '/mahasiswa');
                    break;
                case 'dpa':
                    header('Location: ' . BASEURL . '/dpa');
                    break;
                    // Tambahkan case sesuai dengan user_type lainnya
                default:
                    $this->view('login/login', ['error' => 'Username or password is incorrect.']);
                    break;
            }
            exit;
        } else {
            // Jika login gagal, mungkin tampilkan pesan kesalahan atau arahkan kembali ke halaman login
            $this->view('login/index', ['error' => 'Username or password is incorrect.']);
        }
    }
}