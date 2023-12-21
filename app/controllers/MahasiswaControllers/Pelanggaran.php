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
            $this->showSweetAlert('error', 'Gagal', 'Gagal Menyetujui Laporan');
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
            $this->showSweetAlert('error', 'Gagal', 'Banding Gagal Diajukan');
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
                    $this->showSweetAlert('error', 'Gagal', 'Maaf, Anda Hanya Boleh Mengupload file berbentuk PDF');
                    header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
                    exit;
                } else {
                    if (move_uploaded_file($_FILES["file_kumpulSanksi"]["tmp_name"], $target_file)) {
                        // File upload success
                        $filesize = $_FILES["file_kumpulSanksi"]["size"];
                        $filetype = $_FILES["file_kumpulSanksi"]["type"];
                    } else {
                        $this->showSweetAlert('error', 'Gagal', 'Maaf, Tidak ada file yang di upload');
                        header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
                        exit;
                    }
                }
            } else {
                $this->showSweetAlert('error', 'Gagal', 'Maaf, Tidak ada file yang di upload');
                header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
                exit;
            }
        }

        if ($this->model('Laporan_model')->uploadSuratSanksi($_POST, $filename, $filesize, $filetype) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Surat Sanksi Berhasil Diupload');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Surat Sanksi Gagal Diupload');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        }
    }

    public function uploadSuratSanksiKhusus()
    {
        // Handle file upload
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                isset($_FILES["file_kumpulSanksi"])
                && $_FILES["file_kumpulSanksi"]["error"] == 0
                && isset($_FILES["file_buktiSanksiKhusus"])
                && $_FILES["file_buktiSanksiKhusus"]["error"] == 0
            ) {
                $target_dir1 = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/assets/file/suratSanksi/";
                $target_dir2 = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/assets/file/buktiTugasKhusus/";

                $file_extension1 = strtolower(pathinfo($_FILES["file_kumpulSanksi"]["name"], PATHINFO_EXTENSION));
                $file_extension2 = strtolower(pathinfo($_FILES["file_buktiSanksiKhusus"]["name"], PATHINFO_EXTENSION));

                // Generate a unique filename using timestamp
                $filename1 = "file_" . time() . "." . $file_extension1;
                $filename2 = "file_" . time() . "." . $file_extension2;

                $target_file1 = $target_dir1 . $filename1;
                $target_file2 = $target_dir2 . $filename2;

                $allowed_types = array("pdf");
                if (!in_array($file_extension1, $allowed_types) && !in_array($file_extension2, $allowed_types)) {
                    $this->showSweetAlert('error', 'Gagal', 'Maaf, Anda Hanya Boleh Mengupload file berbentuk PDF');
                    header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
                    exit;
                } else {
                    if (
                        move_uploaded_file($_FILES["file_kumpulSanksi"]["tmp_name"], $target_file1)
                        &&
                        move_uploaded_file($_FILES["file_buktiSanksiKhusus"]["tmp_name"], $target_file2)
                    ) {
                        // File upload success
                        $filesize = $_FILES["file_kumpulSanksi"]["size"];
                        $filetype = $_FILES["file_kumpulSanksi"]["type"];
                        $filesize = $_FILES["file_buktiSanksiKhusus"]["size"];
                        $filetype = $_FILES["file_buktiSanksiKhusus"]["type"];
                    } else {
                        $this->showSweetAlert('error', 'Gagal', 'Maaf, Tidak ada file yang di upload');
                        header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
                        exit;
                    }
                }
            } else {
                $this->showSweetAlert('error', 'Gagal', 'Maaf, Tidak ada file yang di upload');
                header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
                exit;
            }
        }

        if ($this->model('Laporan_model')->uploadSuratSanksiKhusus($_POST, $filename1, $filename1, $filesize, $filetype) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Surat Sanksi dan Bukti Tugas Berhasil Diupload');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Surat Sanksi dan Bukti Tugas Gagal Diupload');
            header('Location: ' . BASEURL . '/MahasiswaControllers/pelanggaran');
            exit;
        }
    }
}
