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

        // Pengecekan perubahan di user
        if (
            $_POST['password'] != $_POST['password_lama'] ||
            $_POST['nip'] != $_POST['nip_lama']
        ) {
            // Ubah data user dosen
            if ($this->model('Dosen_model')->ubahDataUser($_POST) > 0) {
                $userChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan user
                $this->showSweetAlert('error', 'Ooops', 'Data User Dosen Gagal Diubah');
                header('Location: ' . BASEURL . '/dosen');
                exit;
            }
        } else {
            // Tidak ada perubahan di user
            $userChanged = false;
        }

        // Pengecekan perubahan di dosen
        if (
            $_POST['nama'] != $_POST['nama_lama'] ||
            $_POST['email'] != $_POST['email_lama']
        ) {
            // Ubah data dosen
            if ($this->model('Dosen_model')->ubahDataDosen($_POST) > 0) {
                $dosenChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan dosen
                $this->showSweetAlert('error', 'Ooops', 'Data Dosen Gagal Diubah');
                header('Location: ' . BASEURL . '/dosen');
                exit;
            }
        } else {
            // Tidak ada perubahan di dosen
            $dosenChanged = false;
        }

        // SweetAlert jika tidak ada perubahan di kedua entitas
        if (!$userChanged && !$dosenChanged) {
            $this->showSweetAlert('info', 'Tidak ada perubahan pada data Dosen', 'info');
            header('Location: ' . BASEURL . '/dosen');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data berhasil Diubah');
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
