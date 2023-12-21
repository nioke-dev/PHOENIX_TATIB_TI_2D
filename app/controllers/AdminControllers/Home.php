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
        $data['countMahasiswa'] = $this->model('Mahasiswa_model')->getCountMahasiswaAdminRole();
        $data['countAdmin'] = $this->model('Admin_model')->getCountAdminAdminRole();
        $data['countDosen'] = $this->model('Dosen_model')->getCountDosenAdminRole();
        $data['countDpa'] = $this->model('Dpa_model')->getCountDpaAdminRole();
        $data['countTatib'] = $this->model('Tatib_model')->getCountTatibAdminRole();

        $data['countMahasiswaMelanggar'] = $this->model('mahasiswaMelanggar_model')->getCountMhsMelanggarAdminRole();
        $data['countBanding'] = $this->model('Banding_model')->getCountMhsBandingAdminRole();
        $data['countLaporan'] = $this->model('Laporan_model')->getCountMhsLaporanAdminRole();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/home/index', $data);
        $this->view('templates/footer');
    }
}
