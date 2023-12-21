<?php

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index()
    {
        $data['judul'] = 'Profile Dosen';
        $data['dsn'] = $this->model('Dosen_model')->getDosenByNip($_SESSION['username']);
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosenRole/profile/index', $data);
        $this->view('templates/footer', $data);
    }

    public function changePassword()
    {
        $getNipDosen =  $this->model('Dosen_model')->getUserDosenByNipToChangePass($_SESSION['username']);
        if (md5($_POST['oldPassword']) !== $getNipDosen['password']) {
            $this->showSweetAlert('error', 'Gagal', 'Kata Sandi Lama Anda Tidak Sesuai');
            header('Location: ' . BASEURL . '/DosenControllers/profile');
            exit;
        }

        if ($_POST['password'] !== $_POST['confirmPassword']) {
            $this->showSweetAlert('error', 'Gagal', 'Kata Sandi Baru dan Kata Sandi Konfirmasi Harus Sama');
            header('Location: ' . BASEURL . '/DosenControllers/profile');
            exit;
        }
        if ($this->model('User_model')->changePassword($_POST) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Kata Sandi Berhasil Diperbarui Silahkan Login Kembali');
            header('Location: ' . BASEURL . '/DosenControllers/profile');
            exit;
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Kata Sandi Baru dan Lama Tidak Boleh Sama');
            header('Location: ' . BASEURL . '/DosenControllers/profile');
            exit;
        }
    }
}
