<?php

class MahasiswaMelanggar extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    // Fungsi untuk menampilkan halaman daftar mahasiswa
    public function index()
    {

        $data['judul'] = 'Daftar Mahasiswa Melanggar';
        $data['mhs_melanggar'] = $this->model('MahasiswaMelanggar_model')->getAllMahasiswaMelanggar();
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/mahasiswaMelanggar/index', $data);
        $this->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan detail mahasiswa dalam format JSON
    public function detail()
    {
        echo json_encode($this->model('MahasiswaMelanggar_model')->getMahasiswaMelanggarByNim($_POST['nim_mahasiswa']));
    }

    // Fungsi untuk menampilkan data mahasiswa dalam format JSON untuk keperluan pengeditan
    public function getubah()
    {
        echo json_encode($this->model('MahasiswaMelanggar_model')->getMahasiswaMelanggarByNim($_POST['nim_mahasiswa']));
    }

    // Fungsi untuk mengubah data mahasiswa
    public function ubah()
    {        
        $mahasiswaMelanggarChanged = false;
        if (
            $_POST['id_tingkatSanksi'] != $_POST['id_tingkatSanksiLama']
        ) {
            // Ubah data Tatib
            if ($this->model('MahasiswaMelanggar_model')->ubahDataMahasiswaMelanggar($_POST) > 0) {
                $mahasiswaMelanggarChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan Tatib
                $this->showSweetAlert('error', 'Gagal', 'Data Mahasiswa Melanggar Gagal Diubah');
                header('Location: ' . BASEURL . '/AdminControllers/mahasiswaMelanggar');
                exit;
            }
        }

        // SweetAlert jika tidak ada perubahan di Tatib
        if (!$mahasiswaMelanggarChanged) {
            $this->showSweetAlert('info', 'Info', 'Tidak ada perubahan pada data Mahasiswa Melanggar');
            header('Location: ' . BASEURL . '/AdminControllers/mahasiswaMelanggar');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data Mahasiswa Melanggar berhasil Diubah');
            header('Location: ' . BASEURL . '/AdminControllers/mahasiswaMelanggar');
            exit;
        }
    }
}
