<?php

class Matkul extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Matkul Dosen';
        $data['matkul'] = $this->model('Matkul_model')->getAllMatkul();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer', $data);
    }

    // public function detail()
    // {
    //     echo json_encode($this->model('Dosen_model')->getDosenByNip($_POST['nip_dosen']));
    // }

    public function tambah()
    {
        if (
            $this->model('Matkul_model')->tambahDataMatkul($_POST) > 0
        ) {

            $this->showSweetAlert('success', 'Berhasil', 'Data Matkul Dosen Berhasil Ditambahkan');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Matkul Dosen Gagal ditambahkan');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function hapus($id_matkul)
    {
        if ($this->model('Matkul_model')->hapusDataMatkul($id_matkul) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Matkul Dosen Berhasil Dihapus');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            // Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Matkul_model')->getMatkulById_Matkul($_POST['id_matkul']));
    }


    // public function ubah()
    // {
    //     if ($this->model('Dosen_model')->ubahDataDosen($_POST) > 0) {
    //         // Flasher::setFlash('berhasil', 'diubah', 'success');
    //         header('Location: ' . BASEURL . '/dosen');
    //         exit;
    //     } else {
    //         // Flasher::setFlash('gagal', 'diubah', 'danger');
    //         header('Location: ' . BASEURL . '/dosen');
    //         exit;
    //     }
    // }

    // public function cari()
    // {
    //     $data['judul'] = 'Daftar Dosen';
    //     $data['dsn'] = $this->model('Dosen_model')->cariDataDosen();

    //     $this->view('templates/header', $data);
    //     $this->view('templates/sidebar', $data);
    //     $this->view('templates/headerNav', $data);
    //     $this->view('dosen/index', $data);
    //     $this->view('templates/footer', $data);
    // }
}
