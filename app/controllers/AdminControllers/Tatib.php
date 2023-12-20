<?php

class Tatib extends Controller
{
    public function __construct()
    {
        $this->middleware('AuthMiddleware')->handle();
    }

    public function index()
    {
        $data['judul'] = 'Daftar Tatib';
        $data['tatib'] = $this->model('Tatib_model')->getAllTatib();
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/headerNav', $data);
        $this->view('adminRole/tatib/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail()
    {
        echo json_encode($this->model('Tatib_model')->getTatibById($_POST['id_tatib']));
    }


    public function tambah()
    {
        if (
            $this->model('Tatib_model')->tambahDataTatib($_POST) > 0
        ) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Tatib Berhasil Ditambahkan');
            header('Location: ' . BASEURL . '/AdminControllers/tatib');
            exit;
        } else {
            $this->showSweetAlert('error', 'Gagal', 'Data Tatib Gagal Ditambahkan');
            header('Location: ' . BASEURL . '/AdminControllers/tatib');
            exit;
        }
    }

    public function hapus($id_tatib)
    {
        if ($this->model('Tatib_model')->hapusDataTatib($id_tatib) > 0) {
            $this->showSweetAlert('success', 'Berhasil', 'Data Tatib Berhasil Dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/tatib');
            exit;
        } else {
            $this->showSweetAlert('success', 'Gagal', 'Data Tatib Gagal Dihapus');
            header('Location: ' . BASEURL . '/AdminControllers/tatib');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Tatib_model')->getTatibById(['id_tatib' => $_POST['id_tatib']]));
    }

    public function upload()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["fileTatib"]) && $_FILES["fileTatib"]["error"] == 0) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/assets/file/";
                $file_extension = strtolower(pathinfo($_FILES["fileTatib"]["name"], PATHINFO_EXTENSION));

                // Generate a unique filename using timestamp
                $filename = "Tata_tertib." . $file_extension;
                $target_file = $target_dir . $filename;

                $allowed_types = array("pdf");
                if (!in_array($file_extension, $allowed_types)) {
                    $this->showSweetAlert('error', 'Ooops', 'Sorry, Hanya Diperbolehkan PDF');
                    header('Location: ' . BASEURL . '/AdminControllers/tatib');
                    exit;
                } else {
                    $this->deleteFile('Tata_tertib.pdf');
                    if (move_uploaded_file($_FILES["fileTatib"]["tmp_name"], $target_file)) {
                        // File upload success
                        $filesize = $_FILES["fileTatib"]["size"];
                        $filetype = $_FILES["fileTatib"]["type"];

                        $this->showSweetAlert('success', 'Berhasil', 'Upload berhasil');
                        header('Location: ' . BASEURL . '/AdminControllers/tatib');
                        exit;
                    } else {
                        $this->showSweetAlert('error', 'Ooops', 'Sorry, there was an error uploading your file.');
                        header('Location: ' . BASEURL . '/AdminControllers/tatib');
                        exit;
                    }
                }
            } else {
                $this->showSweetAlert('error', 'Ooops', 'Sorry, Tidak ada file yang di upload');
                header('Location: ' . BASEURL . '/AdminControllers/tatib');
                exit;
            }
        }
    }

    private function deleteFile($filename)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . BASEPUBLIC . "/assets/file/";
        $target_file = $target_dir . $filename;

        // Check if the file exists before attempting to delete it
        if (file_exists($target_file)) {
            // Attempt to delete the file
            if (unlink($target_file)) {
                // File deletion success
                return true;
            } else {
                // File deletion failure                
                $this->showSweetAlert('error', 'Ooops', 'Maaf Terjadi Error Saat Menghapus File');
                header('Location: ' . BASEURL . '/AdminControllers/tatib');
                exit;
            }
        } else {
            // File doesn't exist            
            $this->showSweetAlert('error', 'Ooops', 'File Tidak Ada');
            header('Location: ' . BASEURL . '/AdminControllers/tatib');
            exit;
        }
    }

    public function ubah()
    {
        // Pengecekan perubahan di Tatib
        $tatibChanged = false;
        if (
            $_POST['deskripsi'] != $_POST['deskripsiLama'] ||
            $_POST['id_tingkatSanksi'] != $_POST['id_tingkatSanksiLama']
        ) {
            // Ubah data Tatib
            if ($this->model('Tatib_model')->ubahDataTatib($_POST) > 0) {
                $tatibChanged = true;
            } else {
                // SweetAlert jika ada masalah pada perubahan Tatib
                $this->showSweetAlert('error', 'Ooops', 'Data Tatib Gagal Diubah');
                header('Location: ' . BASEURL . '/AdminControllers/tatib');
                exit;
            }
        }

        // SweetAlert jika tidak ada perubahan di Tatib
        if (!$tatibChanged) {
            $this->showSweetAlert('info', 'Info', 'Tidak ada perubahan pada data Tatib');
            header('Location: ' . BASEURL . '/AdminControllers/tatib');
            exit;
        } else {
            $this->showSweetAlert('success', 'Berhasil', 'Data Tatib berhasil Diubah');
            header('Location: ' . BASEURL . '/AdminControllers/tatib');
            exit;
        }
    }
}
