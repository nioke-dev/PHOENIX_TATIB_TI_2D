<?php

class RekapLaporan extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index()
    {
        $data['judul'] = 'Daftar Laporan';
        $dataDPA = $this->model('Dpa_model')->getDpaByNip($_SESSION['username']);
        $data['laporan'] = $this->model('Laporan_model')->getAllLaporanInDpaRole($dataDPA);
        $data['nama'] = $this->model('User_model')->getUser();
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data['tatib'] = $this->model('tatib_model')->getAllTatib();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpaRole/rekapLaporan/index', $data);
        $this->view('templates/footer', $data);
    }
    public function detail()
    {
        echo json_encode($this->model('Laporan_model')->getLaporanById($_POST['id_laporan']));
    }
}
