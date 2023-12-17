<?php

class Dpa extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    // Fungsi untuk menampilkan halaman daftar dpa
    public function index()
    {
        $data['judul'] = 'Daftar DPA';
        $data['dp'] = $this->model('Dpa_model')->getAllDpa();
        $data['nama'] = $this->model('User_model')->getUser();
        $data['dsn'] = $this->model('Dosen_model')->getAllDosenFilterDpaFound();
        $data['dsn_ubah'] = $this->model('Dosen_model')->getAllDosenFilterDpaFoundExceptChange();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/dpa/index', $data);
        $this->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan detail dpa dalam format JSON
    public function detail()
    {
        echo json_encode($this->model('Dpa_model')->getDpaByNip($_POST['nip_dpa']));
    }

    // Fungsi untuk menambahkan data dpa
    // public function tambah()
    // {
    //     if ($this->model('Dpa_model')->tambahUserDpa($_POST) > 0) {
    //         $dataUser['userDpaId'] = $this->model('Dpa_model')->getUserDpaByNip($_POST);
    //         $this->model('Dpa_model')->ubahuserTypeUserDpa($dataUser);
    //         $dataDosen['dataDosen'] = $this->model('Dpa_model')->getDosenByNip($_POST['nip_dpa']);
    //         if ($this->model('Dpa_model')->tambahDataDpa($_POST, $dataUser, $dataDosen) > 0) {
    //             $this->showSweetAlert('success', 'Berhasil', 'Data DPA Berhasil Ditambahkan');
    //             header('Location: ' . BASEURL . '/AdminControllers/dpa');
    //             exit;
    //         } else {
    //             $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Ditambahkan');
    //             header('Location: ' . BASEURL . '/AdminControllers/dpa');
    //             exit;
    //         }
    //     } else {
    //         $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Ditambahkan');
    //         header('Location: ' . BASEURL . '/AdminControllers/dpa');
    //         exit;
    //     }

    // }

    public function tambah()
    {
        $dataUser['userDpaId'] = $this->model('Dpa_model')->getUserDpaByNip($_POST);
        if ($this->model('Dpa_model')->ubahuserTypeUserDpa($dataUser) > 0) {
            $dataDosen['dataDosen'] = $this->model('Dpa_model')->getDosenByNip($_POST['nip_dpa']);
            // Modifikasi bagian ini
            if ($this->model('Dpa_model')->tambahDataDpa($_POST, $dataUser, $dataDosen) > 0) {
                $this->showSweetAlert('success', 'Berhasil', 'Data DPA Berhasil Ditambahkan');
                header('Location: ' . BASEURL . '/AdminControllers/dpa');
                exit;
            } else {
                // Jika tambahDataDpa gagal
                $this->model('Dpa_model')->ubahuserTypeUserDpaToDosen($dataUser); // Tambahkan fungsi hapusUserDpa sesuai dengan kebutuhan Anda
                $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Ditambahkan');
                header('Location: ' . BASEURL . '/AdminControllers/dpa');
                exit;
            }
        } else {
            // Jika tambahUserDpa gagal
            $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Ditambahkan');
            header('Location: ' . BASEURL . '/AdminControllers/dpa');
            exit;
        }
    }


    // Fungsi untuk menghapus data dpa
    public function hapus($nip_dpa)
    {
        $dataUser['userDpaId'] = $this->model('Dpa_model')->getUserDpaByNipForDelete($nip_dpa);
        $this->model('Dpa_model')->ubahuserTypeUserDpaForDelete($dataUser);
        if ($this->model('Dpa_model')->hapusDataDpa($nip_dpa) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data DPA Berhasil Dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/dpa');
            exit;
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Data DPA Gagal Dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/dpa');
            exit;
        }
    }

    // Fungsi untuk menampilkan data dpa dalam format JSON untuk keperluan pengeditan
    public function getubah()
    {
        echo json_encode($this->model('Dpa_model')->getDpaByNip($_POST['nip_dpa']));
    }    

    public function ubah()
    {
        $dpaChanged = false;
        if (
            $_POST['kelas_dpa_ubah'] != $_POST['kelas_dpa_ubah_Lama']
        ) {
            // Ubah data Tatib
            if ($this->model('Dpa_model')->ubahDataDpa($_POST) > 0) {
                $dpaChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan Tatib
                $this->showSweetAlert('error', 'Gagal', 'Data Dpa Gagal Diubah');
                header('Location: ' . BASEURL . '/AdminControllers/dpa');
                exit;
            }
        }

        // SweetAlert jika tidak ada perubahan di Tatib
        if (!$dpaChanged) {
            $this->showSweetAlert('info', 'Info', 'Tidak ada perubahan pada data Dpa');
            header('Location: ' . BASEURL . '/AdminControllers/dpa');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data Dpa berhasil Diubah');
            header('Location: ' . BASEURL . '/AdminControllers/dpa');
            exit;
        }
    }
}
