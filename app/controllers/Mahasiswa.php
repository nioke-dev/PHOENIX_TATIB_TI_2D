<?php

class Mahasiswa extends Controller
{
    // Fungsi untuk menampilkan halaman daftar mahasiswa
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan detail mahasiswa dalam format JSON
    public function detail()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaByNim($_POST['nim_mahasiswa']));
    }

    // Fungsi untuk menambahkan data mahasiswa
    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahUserMahasiswa($_POST) > 0) {
            $dataUser['userMahasiswaId'] = $this->model('Mahasiswa_model')->getUserMahasiswaByNim($_POST);
            if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST, $dataUser) > 0) {
                $this->showSweetAlert('success', 'Berhasil', 'Data Mahasiswa berhasil ditambahkan');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                $this->showSweetAlert('error', 'Ooops', 'Data Mahasiswa Gagal ditambahkan');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Mahasiswa Gagal ditambahkan');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // Fungsi untuk menghapus data mahasiswa
    public function hapus($nim)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($nim) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Mahasiswa berhasil dihapus');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Mahasiswa Gagal dihapus');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // Fungsi untuk menampilkan data mahasiswa dalam format JSON untuk keperluan pengeditan
    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaByNim($_POST['nim_mahasiswa']));
    }

    // Fungsi untuk mengubah data mahasiswa
    public function ubah()
    {
        // Pengecekan perubahan di user
        if (
            $_POST['password'] != $_POST['password_lama'] ||
            $_POST['nim_mahasiswa'] != $_POST['nim_mahasiswa_lama']
        ) {
            // Ubah data user mahasiswa
            if ($this->model('Mahasiswa_model')->ubahDataUserMahasiswa($_POST) > 0) {
                $userChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan user
                $this->showSweetAlert('error', 'Ooops', 'Data Mahasiswa Gagal Diubah');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        } else {
            // Tidak ada perubahan di user
            $userChanged = false;
        }

        // Pengecekan perubahan di mahasiswa
        if (
            $_POST['nama_mahasiswa'] != $_POST['nama_mahasiswa_lama'] ||
            $_POST['kelas_mahasiswa'] != $_POST['kelas_mahasiswa_lama'] ||
            $_POST['prodi_mahasiswa'] != $_POST['prodi_mahasiswa_lama'] ||
            $_POST['email_mahasiswa'] != $_POST['email_mahasiswa_lama']
        ) {
            // Ubah data mahasiswa
            if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
                $mahasiswaChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan mahasiswa
                $this->showSweetAlert('error', 'Ooops', 'Data Mahasiswa Gagal Diubah');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        } else {
            // Tidak ada perubahan di mahasiswa
            $mahasiswaChanged = false;
        }

        // SweetAlert jika tidak ada perubahan di kedua entitas
        if (!$userChanged && !$mahasiswaChanged) {
            $this->showSweetAlert('info', 'Tidak ada perubahan pada data Mahasiswa', 'info');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data berhasil Diubah');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // Fungsi untuk mencari data mahasiswa berdasarkan keyword
    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }
}
