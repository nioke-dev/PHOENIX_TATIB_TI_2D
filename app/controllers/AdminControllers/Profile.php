<?php

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index()
    {
        $data['judul'] = 'Profile Admin';
        $data['adm'] = $this->model('Admin_model')->getAdminByNip($_SESSION['username']);
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/profile/index', $data);
        $this->view('templates/footer', $data);
    }

    public function changePassword()
    {
        $getNipAdmin =  $this->model('Admin_model')->getUserAdminByNipToChangePass($_SESSION['username']);
        if (md5($_POST['oldPassword']) !== $getNipAdmin['password']) {
            $this->showSweetAlert('error', 'Gagal', 'Kata Sandi Lama Anda Tidak Sesuai');
            header('Location: ' . BASEURL . '/AdminControllers/profile');
            exit;
        }

        if ($_POST['password'] !== $_POST['confirmPassword']) {
            $this->showSweetAlert('error', 'Gagal', 'Kata Sandi Baru dan Kata Sandi Konfirmasi Harus Sama');
            header('Location: ' . BASEURL . '/AdminControllers/profile');
            exit;
        }
        if ($this->model('User_model')->changePassword($_POST) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Kata Sandi Berhasil Diperbarui Silahkan Login Kembali');
            header('Location: ' . BASEURL . '/AdminControllers/profile');
            exit;
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Kata Sandi Baru dan Lama Tidak Boleh Sama');
            header('Location: ' . BASEURL . '/AdminControllers/profile');
            exit;
        }
    }
}
