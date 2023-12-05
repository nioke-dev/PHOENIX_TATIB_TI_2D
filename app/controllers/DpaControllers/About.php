<?php

class About extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index($nama = 'Nurul Mustofa', $pekerjaan = 'Programmer', $umur = 19)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpaRole/about/index', $data);
        $this->view('templates/footer', $data);
    }

    public function page()
    {
        $data['judul'] = 'Pages';


        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpaRole/about/page', $data);
        $this->view('templates/footer', $data);
    }
}
