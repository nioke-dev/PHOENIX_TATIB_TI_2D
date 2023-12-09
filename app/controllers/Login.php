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
            $_SESSION['username'] = $userData['username'];
            $getName = $this->model('User_model')->getUser();

            // Jika login berhasil, arahkan URL sesuai dengan user_type            
            switch ($userData['user_type']) {
                case 'dosen':
                    header('Location: ' . BASEURL . '/DosenControllers/home');
                    $namaDosen = $getName["nama_dosen"];
                    $this->showSweetAlert('success', 'Login Berhasil', "Selamat Datang $namaDosen");
                    break;
                case 'mahasiswa':
                    header('Location: ' . BASEURL . '/MahasiswaControllers/home');
                    $namaMahasiswa = $getName["nama_mahasiswa"];
                    $this->showSweetAlert('success', 'Login Berhasil', "Selamat Datang $namaMahasiswa");
                    break;
                case 'dpa':
                    header('Location: ' . BASEURL . '/DpaControllers/home');
                    $namaDpa = $getName["nama_dpa"];
                    $this->showSweetAlert('success', 'Login Berhasil', "Selamat Datang $namaDpa");
                    break;
                case 'admin':
                    header('Location: ' . BASEURL . '/AdminControllers/home');
                    $namaAdmin = $getName["nama_admin"];
                    $this->showSweetAlert('success', 'Login Berhasil', "Selamat Datang $namaAdmin");
                    break;
            }
            exit;
        } else {
            // Jika login gagal, mungkin tampilkan pesan kesalahan atau arahkan kembali ke halaman login
            $this->showSweetAlert('error', 'Login Gagal', 'Username atau Password yang Anda Masukkan Salah.');
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function logout()
    {
        // Hapus semua data sesi
        session_unset();
        session_destroy();

        // Redirect ke halaman login setelah logout
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
