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
        $getKelasDpa = $this->model('Banding_model')->getDpaKelas($_SESSION['username']);
        $data['kelas_dpa'] = $this->model('Banding_model')->getAllBandingByDpa($getKelasDpa);
        // $data['nip_dpa'] = $_SESSION['username'];
        // $data['bd'] = $this->model('Banding_model')->getAllBandingByDpa($data);
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dpaRole/banding/index', $data);
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
            header('Location: ' . BASEURL . '/DpaControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Banding Gagal dihapus');
            header('Location: ' . BASEURL . '/DpaControllers/banding');
            exit;
        }
    }
}