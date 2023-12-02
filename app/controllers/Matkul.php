<?php

class Matkul extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Matkul Dosen';
        $data['matkul'] = $this->model('Matkul_model')->getAllMatkul();
        $data['nama'] = $this->model('User_model')->getUser();
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
            $this->showSweetAlert('success', 'Berhasil', 'Data Matkul Dosen Gagal Dihapus');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Matkul_model')->getMatkulById(['id_matkul' => $_POST['id_matkul']]));
    }



    public function ubah()
    {
        // Pengecekan perubahan di matkul
        if ($_POST['matkul'] != $_POST['matkul_lama'] || $_POST['nip_dosen'] != $_POST['nip_dosen_lama']) {
            // Ubah data matkul
            if ($this->model('Matkul_model')->ubahDataMatkul($_POST) > 0) {
                $matkulChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan matkul
                $this->showSweetAlert('error', 'Ooops', 'Data Matkul Dosen Gagal Diubah');
                header('Location: ' . BASEURL . '/matkul');
                exit;
            }
        } else {
            // Tidak ada perubahan di matkul
            $matkulChanged = false;
        }

        // SweetAlert jika tidak ada perubahan pada data matkul
        if (!$matkulChanged) {
            $this->showSweetAlert('info', 'Tidak ada perubahan pada data Matkul Dosen', 'info');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data berhasil Diubah');
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Matkul';
        $data['matkul'] = $this->model('Matkul_model')->cariDataMatkul();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer', $data);
    }
}
