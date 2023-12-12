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
        $data['nip_dosen'] = $_SESSION['username'];
        $data['bd'] = $this->model('Banding_model')->getAllBandingByDosen($data);
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosenRole/banding/index', $data);
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
            header('Location: ' . BASEURL . '/DosenControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Banding Gagal dihapus');
            header('Location: ' . BASEURL . '/DosenControllers/banding');
            exit;
        }
    }

    public function setujuBanding($id_banding)
    {
        if ($this->model('Banding_model')->setujuBanding($id_banding) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Banding berhasil Di Setujui');
            header('Location: ' . BASEURL . '/DosenControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Banding Gagal Disetujui');
            header('Location: ' . BASEURL . '/DosenControllers/banding');
            exit;
        }
    }

    public function tolakBanding($id_banding)
    {
        if ($this->model('Banding_model')->tolakBanding($id_banding) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Banding berhasil Di Tolak');
            header('Location: ' . BASEURL . '/DosenControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Banding Gagal Ditolak');
            header('Location: ' . BASEURL . '/DosenControllers/banding');
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
    //     $this->view('dosenRole/banding/index', $data);
    //     $this->view('templates/footer', $data);
    // }
}
