<?php

class Dosen extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Dosen';
        $data['dsn'] = $this->model('Dosen_model')->getAllDosen();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosen/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail()
    {
        echo json_encode($this->model('Dosen_model')->getDosenByNip($_POST['nip_dosen']));
    }

    public function tambah()
    {
        if ($this->model('Dosen_model')->tambahUserDosen($_POST) > 0) {
            # code...
            $dataUser['userDosenId'] = $this->model('Dosen_model')->getUserDosenByNip($_POST);

            if (
                $this->model('Dosen_model')->tambahDataDosen($_POST, $dataUser) > 0
            ) {

                $this->showSweetAlert('success', 'Berhasil', 'Data Dosen berhasil ditambahkan');
                header('Location: ' . BASEURL . '/dosen');
                exit;
            } else {
                $this->showSweetAlert('error', 'Ooops', 'Data Dosen Gagal ditambahkan');
                header('Location: ' . BASEURL . '/dosen');
                exit;
            }
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Dosen Gagal ditambahkan');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Dosen_model')->hapusDataDosen($id) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Dosen berhasil Dihapus');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Dosen Gagal dihapus');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Dosen_model')->getDosenByNip($_POST['nip_dosen']));
    }

    public function ubah()
    {
        if ($this->model('Dosen_model')->ubahDataUser($_POST) > 0) {
            if ($this->model('Dosen_model')->ubahDataDosen($_POST) > 0) {
                $this->showSweetAlert('success', 'Berhasil', 'Data Dosen berhasil Diubah');
                header('Location: ' . BASEURL . '/dosen');
                exit;
            } else {
                $this->showSweetAlert('error', 'Ooops', 'Data Dosen Gagal Diubah');
                header('Location: ' . BASEURL . '/dosen');
                exit;
            }
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Dosen Gagal Diubahh');
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Dosen';
        $data['dsn'] = $this->model('Dosen_model')->cariDataDosen();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosen/index', $data);
        $this->view('templates/footer', $data);
    }
}
