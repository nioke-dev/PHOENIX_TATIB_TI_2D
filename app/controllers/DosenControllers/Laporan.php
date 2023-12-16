<?php

class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index()
    {
        $data['judul'] = 'Daftar Laporan';
        $data['laporan'] = $this->model('Laporan_model')->getAllLaporan();
        $data['nama'] = $this->model('User_model')->getUser();
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data['tatib'] = $this->model('tatib_model')->getAllTatib();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('dosenRole/laporan/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail()
    {
        echo json_encode($this->model('Laporan_model')->getLaporanById($_POST['id_laporan']));
    }

    // public function ubah()
    // {
    //     // Get file information before updating laporan data
    //     $file_info = $this->model('Laporan_model')->getFileInformation($_POST['id_laporan']);

    //     // Perform laporan data update
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         // Handle file upload (similar to your tambah method)
    //         // ...

    //         // Handle data laporan update
    //         if ($this->model('Laporan_model')->ubahDataLaporan($_POST) > 0) {
    //             // Delete the associated file if it exists
    //             if ($file_info) {
    //                 $this->deleteFile($file_info);
    //             }

    //             $this->showSweetAlert('success', 'Berhasil', 'Data Laporan berhasil diubah');
    //             header('Location: ' . BASEURL . '/DosenControllers/laporan');
    //             exit;
    //         } else {
    //             $this->showSweetAlert('error', 'Ooops', 'Data Laporan Gagal diubah');
    //             header('Location: ' . BASEURL . '/DosenControllers/laporan');
    //             exit;
    //         }
    //     }
    // }

    public function tambah()
    {
        // Handle file upload
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["file_bukti"]) && $_FILES["file_bukti"]["error"] == 0) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/img/bukti_laporan/";
                $file_extension = strtolower(pathinfo($_FILES["file_bukti"]["name"], PATHINFO_EXTENSION));

                // Generate a unique filename using timestamp
                $filename = "file_" . time() . "." . $file_extension;
                $target_file = $target_dir . $filename;

                $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
                if (!in_array($file_extension, $allowed_types)) {
                    echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
                    exit;
                } else {
                    if (move_uploaded_file($_FILES["file_bukti"]["tmp_name"], $target_file)) {
                        // File upload success
                        $filesize = $_FILES["file_bukti"]["size"];
                        $filetype = $_FILES["file_bukti"]["type"];
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

        // Handle data laporan
        $dataTatibSelect = $this->model('Tatib_model')->getTatibById($_POST);
        if ($this->model('Laporan_model')->tambahDataLaporan($_POST, $dataTatibSelect, $filename, $filesize, $filetype) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Laporan berhasil ditambahkan');
            header('Location: ' . BASEURL . '/DosenControllers/laporan');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Laporan Gagal ditambahkan');
            header('Location: ' . BASEURL . '/DosenControllers/laporan');
            exit;
        }
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
    }



    // Fungsi untuk menghapus data laporan
    public function hapus($id_laporan)
    {
        // Get file information before deleting laporan data
        $file_info = $this->model('Laporan_model')->getFileInformation($id_laporan);

        if ($this->model('Laporan_model')->hapusDataLaporan($id_laporan) > 0) {
            // Delete the associated file
            $this->deleteFile($file_info);

            $this->showSweetAlert('success', 'Berhasil', 'Data Laporan berhasil dihapus');
            header('Location: ' . BASEURL . '/DosenControllers/laporan');
            exit;
        } else {
            $this->showSweetAlert('error', 'Ooops', 'Data Laporan Gagal dihapus');
            header('Location: ' . BASEURL . '/DosenControllers/laporan');
            exit;
        }
    }

    // Function to delete the file
    private function deleteFile($filename)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/img/bukti_laporan/";
        $target_file = $target_dir . $filename;

        // Check if the file exists before attempting to delete it
        if (file_exists($target_file)) {
            // Attempt to delete the file
            if (unlink($target_file)) {
                // File deletion success
                return true;
            } else {
                // File deletion failure
                echo "Sorry, there was an error deleting the file.";
                exit;
            }
        } else {
            // File doesn't exist
            echo "File not found.";
            exit;
        }
    }
}
