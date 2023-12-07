<?php

class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    // Function to display the list of Laporan
    public function index()
    {
        $data['judul'] = 'Daftar Laporan';
        $data['laporan'] = $this->model('Laporan_model')->getAllLaporan();
        $data['nama'] = $this->model('User_model')->getUser();
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosenRole/laporan/index', $data);
        $this->view('templates/footer', $data);
    }

    // Function to display details of a Laporan in JSON format
    public function detail()
    {
        echo json_encode($this->model('Laporan_model')->getLaporanById($_POST['id_laporan']));
    }

    // Function to add Laporan data
    public function tambah()
    {
        if ($this->model('Laporan_model')->tambahDataLaporan($_POST) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Laporan berhasil ditambahkan');
            header('Location: ' . BASEURL . '/AdminControllers/laporan');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Laporan Gagal ditambahkan');
            header('Location: ' . BASEURL . '/AdminControllers/laporan');
            exit;
        }
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
    }

    // Function to delete Laporan data
    public function hapus($id_laporan)
    {
        if ($this->model('Laporan_model')->hapusDataLaporan($id_laporan) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Laporan berhasil dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/laporan');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Laporan Gagal dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/laporan');
            exit;
        }
    }

    // Function to display Laporan data in JSON format for editing purposes
    public function getubah()
    {
        echo json_encode($this->model('Laporan_model')->getLaporanById($_POST['id_laporan']));
    }

    // Function to edit Laporan data
    public function ubah()
    {
        // Validate and process form data
        // ...

        if ($this->model('Laporan_model')->ubahDataLaporan($_POST) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Laporan berhasil Diubah');
            header('Location: ' . BASEURL . '/AdminControllers/laporan');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Laporan Gagal Diubah');
            header('Location: ' . BASEURL . '/AdminControllers/laporan');
            exit;
        }
    }

    // Function to search Laporan data by keyword
    public function cari()
    {
        $data['judul'] = 'Daftar Laporan';
        $data['laporan'] = $this->model('Laporan_model')->cariDataLaporan();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/laporan/index', $data);
        $this->view('templates/footer', $data);
    }
}
