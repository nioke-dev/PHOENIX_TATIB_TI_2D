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

        $data['countBandingDosenRole'] = $this->model('Banding_model')->getCountBandingDosenRole();
        $data['countLaporanDosenRole'] = $this->model('Laporan_model')->getCountLaporanDosenRole();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosenRole/home/index', $data);
        $this->view('templates/footer');
    }
}
