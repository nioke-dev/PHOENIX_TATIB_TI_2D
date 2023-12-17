<?php

class Pelanggaran extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function setuju($id_laporan)
    {
        if ($this->model('Laporan_model')->setujuLaporan($id_laporan) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Berhasil Menyetujui Laporan');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Gagal Menyetujui Laporan');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        }
    }

    // Fungsi untuk menampilkan halaman daftar Pelanggaran
    public function index()
    {
        $data['judul'] = 'Daftar Pelanggaran';
        $data['pelanggaran'] = $this->model('Laporan_model')->getAllLaporanByNim();
        $data['getTingkatSanksi'] = $this->model('MahasiswaMelanggar_model')->getTingkatSanksiByNim($_SESSION['username']);
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
        echo json_encode($this->model('Laporan_model')->getLaporanById($_POST['id_laporan']));
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

    public function uploadSuratSanksi()
    {
        // Handle file upload
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["file_kumpulSanksi"]) && $_FILES["file_kumpulSanksi"]["error"] == 0) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/assets/file/suratSanksi/";
                $file_extension = strtolower(pathinfo($_FILES["file_kumpulSanksi"]["name"], PATHINFO_EXTENSION));

                // Generate a unique filename using timestamp
                $filename = "file_" . time() . "." . $file_extension;
                $target_file = $target_dir . $filename;

                $allowed_types = array("pdf");
                if (!in_array($file_extension, $allowed_types)) {
                    $this->showSweetAlert('error', 'Gagal', 'Sorry, only PDF files are allowed.');
                    header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
                    exit;
                } else {
                    if (move_uploaded_file($_FILES["file_kumpulSanksi"]["tmp_name"], $target_file)) {
                        // File upload success
                        $filesize = $_FILES["file_kumpulSanksi"]["size"];
                        $filetype = $_FILES["file_kumpulSanksi"]["type"];
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                        exit;
                    }
                }
            } else {
                echo "No file was uploaded.";
                exit;
            }
        }

        if ($this->model('Laporan_model')->uploadSuratSanksi($_POST, $filename, $filesize, $filetype) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Surat Sanksi Berhasil Diupload');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Surat Sanksi Gagal Di Upload');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        }
    }
}
