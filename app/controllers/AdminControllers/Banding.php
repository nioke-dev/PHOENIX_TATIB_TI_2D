<?php

class Banding extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    // Fungsi untuk menampilkan halaman daftar banding
    public function index()
    {

        $data['judul'] = 'Daftar Banding';
        $data['bd'] = $this->model('Banding_model')->getAllBanding();
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/banding/index', $data);
        $this->view('templates/footer', $data);
    }

    // Fungsi untuk menampilkan detail banding dalam format JSON
    public function detail()
    {
        echo json_encode($this->model('Banding_model')->getBandingById($_POST['id_banding']));
    }

    // Fungsi untuk menghapus data banding
    public function hapus($id_banding)
    {
        if ($this->model('Banding_model')->hapusDataBanding($id_banding) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Banding berhasil dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Banding Gagal dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/banding');
            exit;
        }
    }

    // Fungsi untuk mengajukan banding 
    // public function tambah()
    // {
    //     if ($this->model('Banding_model')->ajukanBandingMhs($_POST) > 0) {
    //         $this->showSweetAlert('success', 'Berhasil', 'Banding Berhasil Diajukan');
    //         header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
    //         exit;
    //     } else {
    //         $this->showSweetAlert('error', 'Ooops', 'Banding Gagal Diajukan');
    //         header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
    //         exit;
    //     }
    // }

    // Fungsi untuk mencari banding berdasarkan keyword
    // public function cari()
    // {
    //     $data['judul'] = 'Daftar Banding';
    //     $data['bd'] = $this->model('Banding_model')->cariDataBanding();
    //     $data['nama'] = $this->model('User_model')->getUser();

    //     $this->view('templates/header', $data);
    //     $this->view('templates/sidebar', $data);
    //     $this->view('templates/headerNav', $data);
    //     $this->view('adminRole/banding/index', $data);
    //     $this->view('templates/footer', $data);
    // }
}
