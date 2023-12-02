<?php

class Dpa extends Controller
{
    // Fungsi untuk menampilkan halaman daftar dpa
    public function index()
    {
        $data['judul'] = 'Daftar DPA';
        $data['dp'] = $this->model('Dpa_model')->getAllDpa();
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpa/index', $data);
        $this->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan detail dpa dalam format JSON
    public function detail()
    {
        echo json_encode($this->model('Dpa_model')->getDpaByNip($_POST['nip_dpa']));
    }

    // Fungsi untuk menambahkan data dpa
    public function tambah()
    {
        if ($this->model('Dpa_model')->tambahUserDpa($_POST) > 0) {
            $dataUser['userDpaId'] = $this->model('Dpa_model')->getUserDpaByNip($_POST);
            if ($this->model('Dpa_model')->tambahDataDpa($_POST, $dataUser) > 0) {
                $this->showSweetAlert('success', 'Berhasil', 'Data DPA Berhasil Ditambahkan');
                header('Location: ' . BASEURL . '/dpa');
                exit;
            } else {
                $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Ditambahkan');
                header('Location: ' . BASEURL . '/dpa');
                exit;
            }
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Ditambahkan');
            header('Location: ' . BASEURL . '/dpa');
            exit;
        }
    }

    // Fungsi untuk menghapus data dpa
    public function hapus($nip_dpa)
    {
        if ($this->model('Dpa_model')->hapusDataDpa($nip_dpa) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data DPA Berhasil Dihapus');
            header('Location: ' . BASEURL . '/dpa');
            exit;
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Dihapus');
            header('Location: ' . BASEURL . '/dpa');
            exit;
        }
    }

    // Fungsi untuk menampilkan data dpa dalam format JSON untuk keperluan pengeditan
    public function getubah()
    {
        echo json_encode($this->model('Dpa_model')->getDpaByNip($_POST['nip_dpa']));
    }

    // Fungsi untuk mengubah data dpa
    public function ubah()
    {
        // Pengecekan perubahan di user
        if (
            $_POST['password'] != $_POST['password_lama'] ||
            $_POST['nip_dpa'] != $_POST['nip_dpa_lama']
        ) {
            // Ubah data user dpa
            if ($this->model('Dpa_model')->ubahDataUserDpa($_POST) > 0) {
                $userChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan user
                $this->showSweetAlert('error', 'Gagal', 'Data User Gagal Diubah');
                header('Location: ' . BASEURL . '/dpa');
                exit;
            }
        } else {
            // Tidak ada perubahan di user
            $userChanged = false;
        }

        // Pengecekan perubahan di dpa
        if (
            $_POST['nama_dpa'] != $_POST['nama_dpa_lama'] ||
            $_POST['kelas_dpa'] != $_POST['kelas_dpa_lama'] ||
            $_POST['email_dpa'] != $_POST['email_dpa_lama']
        ) {
            // Ubah data dpa
            if ($this->model('Dpa_model')->ubahDataDpa($_POST) > 0) {
                $dpaChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan dpa
                $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Diubah');
                header('Location: ' . BASEURL . '/dpa');
                exit;
            }
        } else {
            // Tidak ada perubahan di dpa
            $dpaChanged = false;
        }

        // SweetAlert jika tidak ada perubahan di kedua entitas
        if (!$userChanged && !$dpaChanged) {
            $this->showSweetAlert('Info', 'Tidak ada perubahan pada data User dan DPA', 'Info');
            header('Location: ' . BASEURL . '/dpa');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data Berhasil Diubah');
            header('Location: ' . BASEURL . '/dpa');
            exit;
        }
    }

    // Fungsi untuk mencari data dpa berdasarkan keyword
    public function cari()
    {
        $data['judul'] = 'Daftar DPA';
        $data['dp'] = $this->model('Dpa_model')->cariDataDpa();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpa/index', $data);
        $this->view('templates/footer', $data);
    }
}
