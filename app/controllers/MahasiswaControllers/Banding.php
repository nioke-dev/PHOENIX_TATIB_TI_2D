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
        $data['nim_mahasiswa'] = $_SESSION['username'];
        $data['bd'] = $this->model('Banding_model')->getAllBandingByMahasiswa($data);
        $data['nama'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('mahasiswaRole/banding/index', $data);
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
            header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Banding Gagal dihapus');
            header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
            exit;
        }
    }

    // Fungsi untuk mengajukan banding 
    public function tambah()
    {
        // Handle file upload
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["file_bukti"]) && $_FILES["file_bukti"]["error"] == 0) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/img/bukti_banding/";
                $file_extension = strtolower(pathinfo($_FILES["file_bukti"]["name"], PATHINFO_EXTENSION));

                // Generate a unique filename using timestamp
                $filename = "file_" . time() . "." . $file_extension;
                $target_file = $target_dir . $filename;

                $allowed_types = array("jpg", "jpeg", "png");
                if (!in_array($file_extension, $allowed_types)) {
                    $this->showSweetAlert('error', 'Ooops', 'Anda Hanya Boleh Menambahkan Dengan Format png, jpeg, jpg');
                    header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
                    exit;
                } else {
                    if (move_uploaded_file($_FILES["file_bukti"]["tmp_name"], $target_file)) {
                        // File upload success
                        $filesize = $_FILES["file_bukti"]["size"];
                        $filetype = $_FILES["file_bukti"]["type"];
                    } else {
                        $this->showSweetAlert('error', 'Ooops', 'Tidak Ada Bukti Yang Di Upload');
                        header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
                        exit;
                    }
                }
            } else {
                echo "No file was uploaded.";
                exit;
            }
        }

        $dataLaporan['dataLaporan'] = $this->model('Laporan_model')->getLaporanById($_POST['id_laporan']);
        if ($this->model('Banding_model')->ajukanBandingMhs($_POST, $dataLaporan, $filename, $filesize, $filetype) > 0) {
            $this->model('Banding_model')->setLaporanStatusTertunda($_POST['id_laporan']);
            $this->showSweetAlert('success', 'Berhasil', 'Banding Berhasil Diajukan');
            header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Banding Gagal Diajukan');
            header('Location: ' . BASEURL . '/MahasiswaControllers/banding');
            exit;
        }
    }

    public function getTambahBanding()
    {
        echo json_encode($this->model('Laporan_model')->getLaporanById($_POST['id_laporan']));
    }
}
