<?php

class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Admin';
        $data['adm'] = $this->model('Admin_model')->getAllAdmin();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('admin/index', $data);
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
                header('Location: ' . BASEURL . '/admin');
                exit;
            } else {
                $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal ditambahkan');
                header('Location: ' . BASEURL . '/admin');
                exit;
            }
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal ditambahkan');
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Admin_model')->hapusDataAdmin($id) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Admin berhasil Dihapus');
            header('Location: ' . BASEURL . '/admin');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal dihapus');
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Admin_model')->getAdminByNip($_POST['nip_admin']));
    }

    public function ubah()
    {
        if ($this->model('Admin_model')->ubahDataUser($_POST) > 0) {
            if ($this->model('Admin_model')->ubahDataAdmin($_POST) > 0) {
                $this->showSweetAlert('success', 'Berhasil', 'Data Admin berhasil Diubah');
                header('Location: ' . BASEURL . '/admin');
                exit;
            } else {
                $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal Diubah');
                header('Location: ' . BASEURL . '/admin');
                exit;
            }
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Admin Gagal Diubahh');
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Admin';
        $data['adm'] = $this->model('Admin_model')->cariDataAdmin();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer', $data);
    }
}
