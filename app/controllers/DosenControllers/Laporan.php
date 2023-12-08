<?php

class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

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

    public function detail()
    {
        echo json_encode($this->model('Laporan_model')->getLaporanById($_POST['id_laporan']));
    }

    public function tambah()
    {

        if ($this->model('Laporan_model')->tambahDataLaporan($_POST) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Laporan berhasil ditambahkan');
            header('Location: ' . BASEURL . '/DosenControllers/laporan');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Laporan Gagal ditambahkan');
            header('Location: ' . BASEURL . '/DosenControllers/laporan');
            exit;
        }
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
    }
}
