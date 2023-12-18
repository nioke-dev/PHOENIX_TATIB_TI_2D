<?php

class Home extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();

        // menampilkan total jumlahnya
        $data['countMahasiswa'] = $this->model('Mahasiswa_model')->getCount();
        $data['countAdmin'] = $this->model('Admin_model')->getCount();
        $data['countDosen'] = $this->model('Dosen_model')->getCountDosen();
        $data['countDpa'] = $this->model('Dpa_model')->getCount();
        $data['countTatib'] = $this->model('Tatib_model')->getCount();

        $data['countMahasiswaMelanggar'] = $this->model('mahasiswaMelanggar_model')->getCountMhs();
        $data['countBanding'] = $this->model('Banding_model')->getCountMhs();
        $data['countLaporan'] = $this->model('Laporan_model')->getCountMhs();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/home/index', $data);
        $this->view('templates/footer');
    }
}
