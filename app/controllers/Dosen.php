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

    public function detail($id)
    {
        $data['judul'] = 'Detail Dosen';
        $data['dsn'] = $this->model('Dosen_model')->getDosenById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosen/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('Dosen_model')->tambahDataDosen($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Dosen_model')->hapusDataDosen($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Dosen_model')->getDosenById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Dosen_model')->ubahDataDosen($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/dosen');
            exit;
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
