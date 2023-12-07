<?php

class Pelanggaran extends Controller
{
   public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }
    
    // Fungsi untuk menampilkan halaman daftar banding
    public function index()
    {

        $data['judul'] = 'Daftar Banding';
        $data['pelanggaran'] = $this->model('Laporan_model')->getAllPelanggaran();
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('mahasiswaRole/pelanggaran/index', $data);
        $this->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan detail banding dalam format JSON
    public function detail()
    {
        echo json_encode($this->model('Banding_model')->getBandingById($_POST['id_banding']));
    }

    // Fungsi untuk mengajukan banding 
    public function tambah()
    {
        if ($this->model('Banding_model')->ajukanBandingMhs($_POST) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Banding Berhasil Diajukan');
            header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Banding Gagal Diajukan');
            header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
            exit;
        }
    }

    // Fungsi untuk mencari banding berdasarkan keyword
    public function cari()
    {
        $data['judul'] = 'Daftar Banding';
        $data['bd'] = $this->model('Banding_model')->cariDataBanding();
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('mahasiswaRole/banding/index', $data);
        $this->view('templates/footer', $data);
    }
}


    