<?php

class Admin extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index()
    {
        $data['judul'] = 'Daftar Admin';
        $data['adm'] = $this->model('Admin_model')->getAllAdmin();
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/admin/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail()
    {
        echo json_encode($this->model('Admin_model')->getAdminByNip($_POST['nip_admin']));
    }

    public function tambah()
    {
        if ($this->model('Admin_model')->tambahUserAdmin($_POST) > 0) {
            # code...
            $dataUser['userAdminId'] = $this->model('Admin_model')->getUserAdminByNip($_POST);

            if (
                $this->model('Admin_model')->tambahDataAdmin($_POST, $dataUser) > 0
            ) {

                $this->showSweetAlert('success', 'Berhasil', 'Data Admin berhasil ditambahkan');
                header('Location: ' . BASEURL . '/AdminControllers/admin');
                exit;
            } else {
                $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal ditambahkan');
                header('Location: ' . BASEURL . '/AdminControllers/admin');
                exit;
            }
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal ditambahkan');
            header('Location: ' . BASEURL . '/AdminControllers/admin');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Admin_model')->hapusDataAdmin($id) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Admin berhasil Dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/admin');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/admin');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Admin_model')->getAdminByNip($_POST['nip_admin']));
    }

    public function ubah()
    {
        // Pengecekan perubahan di user
        if (
            $_POST['nip_admin'] != $_POST['nip_admin_lama']
        ) {
            // Ubah data user admin
            if ($this->model('Admin_model')->ubahDataUser($_POST) > 0) {
                $userChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan user
                $this->showSweetAlert('error', 'Ooops', 'Data User Admin Gagal Diubah');
                header('Location: ' . BASEURL . '/AdminControllers/admin');
                exit;
            }
        } else {
            // Tidak ada perubahan di user
            $userChanged = false;
        }

        // Pengecekan perubahan di admin
        if (
            $_POST['nama_admin'] != $_POST['nama_admin_lama'] ||
            $_POST['email_admin'] != $_POST['email_admin_lama']
        ) {
            // Ubah data admin
            if ($this->model('Admin_model')->ubahDataAdmin($_POST) > 0) {
                $adminChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan admin
                $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal Diubah');
                header('Location: ' . BASEURL . '/AdminControllers/admin');
                exit;
            }
        } else {
            // Tidak ada perubahan di admin
            $adminChanged = false;
        }

        // SweetAlert jika tidak ada perubahan di kedua entitas
        if (!$userChanged && !$adminChanged) {
            $this->showSweetAlert('info', 'Info', 'Tidak ada perubahan pada data Admin');
            header('Location: ' . BASEURL . '/AdminControllers/admin');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data berhasil Diubah');
            header('Location: ' . BASEURL . '/AdminControllers/admin');
            exit;
        }
    }
}
