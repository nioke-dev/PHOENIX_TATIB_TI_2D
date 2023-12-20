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

        $data['countBanding'] = $this->model('Banding_model')->getCountDosenBanding();
        $data['countLaporan'] = $this->model('Laporan_model')->getCountDosen();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpaRole/home/index', $data);
        $this->view('templates/footer');
    }
}
