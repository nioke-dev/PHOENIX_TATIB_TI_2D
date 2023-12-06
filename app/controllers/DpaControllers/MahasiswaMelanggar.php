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
        $getKelasDPA = $this->model('MahasiswaMelanggar_model')->getDpaKelas($_SESSION['user_id']);
        $data['mhs_melanggar'] = $this->model('MahasiswaMelanggar_model')->getAllMahasiswaMelanggarFilterKelas($getKelasDPA);
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpaRole/mahasiswaMelanggar/index', $data);
        $this->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan detail mahasiswa dalam format JSON
    public function detail()
    {
        echo json_encode($this->model('MahasiswaMelanggar_model')->getMahasiswaMelanggarByNim($_POST['nim_mahasiswa']));
    }
}