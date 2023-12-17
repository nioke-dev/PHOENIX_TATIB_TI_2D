<?php

class Laporan_model
{
    private $table = 'laporan';
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    public function setujuLaporan($id_laporan)
    {
        try {
            $query = "UPDATE laporan SET id_statusSanksi = :id_statusSanksi WHERE id_laporan = :id_laporan";

            $this->db->query($query);
            $this->db->bind('id_statusSanksi', '2');
            $this->db->bind('id_laporan', $id_laporan);
            $this->db->execute();

            // Return the number of affected rows by the query operation
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Function to get file information by ID
    public function getFileInformation($id_laporan)
    {
        $this->db->query('SELECT file_bukti FROM ' . $this->table . ' WHERE id_laporan = :id_laporan');
        $this->db->bind('id_laporan', $id_laporan);
        $result = $this->db->single();
        return $result['file_bukti'];
    }

    public function getCount()
    {
        $this->db->query('SELECT COUNT(*) as total FROM laporan WHERE nim_mahasiswa = :nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $_SESSION['username']);
        $result = $this->db->single();
        return $result['total'];
    }

    public function getCountDosen()
    {
        $this->db->query('SELECT COUNT(*) as total FROM laporan WHERE nip_dosen = :nip_dosen');
        $this->db->bind('nip_dosen', $_SESSION['username']);
        $result = $this->db->single();
        return $result['total'];
    }

    // Function to get all Laporan data
    public function getAllLaporanInAdminRole()
    {
        $this->db->query('SELECT laporan.*, mahasiswa.*, tingkatSanksi.*, statusSanksi.* FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi');
        return $this->db->resultSet();
    }

    public function getAllLaporanInDpaRole($dataDpa)
    {
        $this->db->query('SELECT laporan.*, mahasiswa.*, tingkatSanksi.*, statusSanksi.* FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi where mahasiswa.kelas_mahasiswa = :kelas_dpa');
        $this->db->bind('kelas_dpa', $dataDpa['kelas_dpa']);
        return $this->db->resultSet();
    }

    public function getAllLaporan()
    {
        $this->db->query('SELECT laporan.*, mahasiswa.*, tingkatSanksi.*, statusSanksi.* FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi where laporan.nip_dosen = :nip_dosen');
        $this->db->bind('nip_dosen', $_SESSION['username']);
        return $this->db->resultSet();
    }
    public function getAllLaporanByNim()
    {
        $this->db->query('SELECT laporan.*, mahasiswa.*, tingkatSanksi.*, dosen.nama_dosen, statusSanksi.* FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN dosen ON dosen.nip_dosen = laporan.nip_dosen
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi WHERE mahasiswa.nim_mahasiswa = :nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $_SESSION['username']);
        return $this->db->resultSet();
    }

    // Function to get Laporan data by ID
    public function getLaporanById($id_laporan)
    {
        $this->db->query('SELECT laporan.*, dosen.nama_dosen, tatib.deskripsi AS deskripsiTatib, mahasiswa.*, tingkatSanksi.tingkat_sanksi AS tingkat_sanksi, statusSanksi.status_sanksi AS status_sanksi FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN dosen ON laporan.nip_dosen = dosen.nip_dosen
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN tatib ON laporan.id_tatib = tatib.id_tatib
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi WHERE laporan.id_laporan = :id_laporan');

        $this->db->bind('id_laporan', $id_laporan);

        return $this->db->single();
    }


    // Function to add Laporan data
    public function tambahDataLaporan($data, $dataTatibSelect, $filename, $filesize, $filetype)
    {
        try {
            $dateTimeNow = date("Y-m-d");

            // SQL query to add Laporan data
            $query = "INSERT INTO laporan (tgl_laporan, nim_mahasiswa, nip_dosen, deskripsi, id_tingkatSanksi, id_statusSanksi, id_tatib, file_bukti)
            VALUES
            (:tgl_laporan, :nim_mahasiswa, :nip_dosen, :deskripsi, :id_tingkat_sanksi, :id_statusSanksi, :id_tatib, :file_bukti)";

            // Execute the query
            $this->db->query($query);
            $this->db->bind('tgl_laporan', $dateTimeNow);
            $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
            $this->db->bind('nip_dosen', $_SESSION['username']);
            $this->db->bind('deskripsi', $data['deskripsi']);
            $this->db->bind('id_tingkat_sanksi', $dataTatibSelect['id_tingkatSanksi']);
            $this->db->bind('id_statusSanksi', '1');
            $this->db->bind('id_tatib', $data['id_tatib']);
            $this->db->bind('file_bukti', $filename);

            $this->db->execute();

            // Return the number of affected rows by the query operation
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function uploadSuratSanksi($data, $filename, $filesize, $filetype)
    {
        try {
            $query = "UPDATE laporan SET file_kumpulSanksi = :file_kumpulSanksi, id_statusSanksi = :id_statusSanksi WHERE id_laporan = :id_laporan";

            $this->db->query($query);
            $this->db->bind('file_kumpulSanksi', $filename);
            $this->db->bind('id_laporan', $data['id_laporanKerjakanSanksi']);
            $this->db->bind('id_statusSanksi', '5');
            $this->db->execute();

            // Return the number of affected rows by the query operation
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Function to delete Laporan data by ID
    public function hapusDataLaporan($id_laporan)
    {

        try {
            // SQL query to delete Laporan data
            $query = "DELETE FROM laporan WHERE id_laporan = :id_laporan";

            // Execute the query
            $this->db->query($query);
            $this->db->bind('id_laporan', $id_laporan);
            $this->db->execute();

            // Return the number of affected rows by the query operation
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Function to update Laporan data
    public function ubahDataLaporan($data)
    {
        try {
            // SQL query to update Laporan data        
            $query = "UPDATE laporan SET
                        nim_mahasiswa = :nim_mahasiswa,
                        tingkat_pelanggaran = :tingkat_pelanggaran,
                        detail = :detail
                      WHERE id_laporan = :id_laporan";

            // Execute the query
            $this->db->query($query);
            $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
            $this->db->bind('tingkat_pelanggaran', $data['tingkat_pelanggaran']);
            $this->db->bind('detail', $data['detail']);
            $this->db->bind('id_laporan', $data['id_laporan']);
            $this->db->execute();

            // Return the number of affected rows by the query operation
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // fungsi menghitung total laporan di dashboard Admin
    public function getCountMhs()
    {
        $this->db->query('SELECT COUNT(*) as total FROM laporan');
        $result = $this->db->single();
        return $result['total'];
    }
}
