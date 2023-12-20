<?php

class Banding_model
{
    private $table = 'banding';
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    public function setLaporanStatusTertunda($data)
    {
        try {
            $this->db->query('UPDATE laporan SET id_statusSanksi = :id_statusSanksi WHERE id_laporan = :id_laporan');
            $this->db->bind('id_laporan', $data);
            $this->db->bind('id_statusSanksi', '6');
            $this->db->execute();
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function getCount()
    {
        $this->db->query('SELECT COUNT(*) as total FROM banding where nim_mahasiswa = :nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $_SESSION['username']);
        $result = $this->db->single();
        return $result['total'];
    }

    // public function getCountMahasisawaRole()
    // {
    //     $this->db->query('SELECT COUNT(*) as total FROM banding where nim_mahasiswa = :nim_mahasiswa AND id_statusSanksi != 4');
    //     $this->db->bind('nim_mahasiswa', $_SESSION['username']);
    //     $result = $this->db->single();
    //     return $result['total'];
    // }

    public function getCountDosenBanding()
    {
        $this->db->query('SELECT COUNT(*) as total FROM banding where nip_dosen = :nip_dosen AND id_statusSanksi != 4');
        $this->db->bind('nip_dosen', $_SESSION['username']);
        $result = $this->db->single();
        return $result['total'];
    }

    // Fungsi untuk mendapatkan semua data laporan banding
    public function getAllBanding()
    {
        $this->db->query('SELECT banding.*, status_sanksi, mahasiswa.nama_mahasiswa AS nama_mahasiswa FROM banding 
        INNER JOIN statusSanksi ON banding.id_statusSanksi = statusSanksi.id_statusSanksi 
        INNER JOIN mahasiswa ON mahasiswa.nim_mahasiswa = banding.nim_mahasiswa');
        return $this->db->resultSet();
    }

    public function getAllBandingByDosen($data)
    {
        $this->db->query('SELECT b.*, s.status_sanksi, d.nip_dosen, l.id_laporan, m.nama_mahasiswa AS nama_mahasiswa FROM banding b
            INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
            INNER JOIN dosen d ON b.nip_dosen = d.nip_dosen
            INNER JOIN mahasiswa m ON m.nim_mahasiswa = b.nim_mahasiswa
            INNER JOIN laporan l on b.id_laporan = l.id_laporan
            WHERE d.nip_dosen = :nip_dosen');
        $this->db->bind('nip_dosen', $_SESSION['username']);
        return $this->db->resultSet();
    }

    public function getAllBandingByDpa($data)
    {
        $this->db->query('SELECT b.*, d.*, s.status_sanksi, m.nim_mahasiswa, m.nama_mahasiswa, m.kelas_mahasiswa FROM banding b
        INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
        INNER JOIN mahasiswa m ON b.nim_mahasiswa = m.nim_mahasiswa
        INNER JOIN dosen d ON b.nip_dosen = d.nip_dosen
        WHERE m.kelas_mahasiswa = :kelas_dpa');
        $this->db->bind('kelas_dpa', $data['kelas_dpa']);
        return $this->db->resultSet();
    }

    public function getDpaKelas($nip_dpa)
    {
        $this->db->query('SELECT * FROM dpa WHERE nip_dpa=:nip_dpa');
        $this->db->bind('nip_dpa', $nip_dpa);
        return $this->db->single();
    }

    public function getAllBandingByMahasiswa($data)
    {
        $this->db->query('SELECT b.*, s.status_sanksi, d.nama_dosen, m.nim_mahasiswa, l.id_laporan FROM banding b
            INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
            INNER JOIN mahasiswa m ON b.nim_mahasiswa = m.nim_mahasiswa
            INNER JOIN dosen d ON d.nip_dosen = b.nip_dosen
            INNER JOIN laporan l on b.id_laporan = l.id_laporan
            WHERE m.nim_mahasiswa = :nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        return $this->db->resultSet();
    }

    // Fungsi untuk menghapus banding
    public function hapusDataBanding($id_banding)
    {
        try {
            $query = "DELETE FROM banding WHERE id_banding = :id_banding";

            $this->db->query($query);
            $this->db->bind('id_banding', $id_banding);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk mengajukan banding
    public function ajukanBandingMhs($data, $dataLaporan, $filename, $filesize, $filetype)
    {
        try {
            $query = "INSERT INTO banding (nim_mahasiswa, id_laporan, nip_dosen, deskripsi, id_statusSanksi, file_bukti)
                        VALUES
                      (:nim_mahasiswa, :id_laporan, :nip_dosen, :deskripsi, :id_statusSanksi, :file_bukti)";
            $this->db->query($query);
            $this->db->bind('nim_mahasiswa', $_SESSION['username']);
            $this->db->bind('id_laporan', $dataLaporan['dataLaporan']['id_laporan']);
            $this->db->bind('nip_dosen', $dataLaporan['dataLaporan']['nip_dosen']);
            $this->db->bind('deskripsi', $data['alasan_banding']);
            $this->db->bind('id_statusSanksi', '1');
            $this->db->bind('file_bukti', $filename);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function getBandingById($id_banding)
    {
        $this->db->query('SELECT banding.*, dosen.nama_dosen, mahasiswa.nama_mahasiswa AS nama_mahasiswa FROM banding 
        INNER JOIN mahasiswa ON mahasiswa.nim_mahasiswa = banding.nim_mahasiswa
        INNER JOIN dosen ON dosen.nip_dosen = banding.nip_dosen 
        WHERE id_banding=:id_banding');
        $this->db->bind('id_banding', $id_banding);
        return $this->db->single();
    }

    public function setujuBandingTableBanding($id_banding)
    {

        try {
            $this->db->query('UPDATE banding SET id_statusSanksi = :id_statusSanksi WHERE id_banding = :id_banding');
            $this->db->bind('id_statusSanksi', '2');
            $this->db->bind('id_banding', $id_banding);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }
    public function setujuBandingTableLaporan($id_laporan)
    {
        try {
            $this->db->query('UPDATE laporan SET id_statusSanksi = :id_statusSanksi WHERE id_laporan = :id_laporan');
            $this->db->bind('id_statusSanksi', '4');
            $this->db->bind('id_laporan', $id_laporan);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }
    public function tolakBandingTableBanding($id_banding)
    {
        try {
            $this->db->query('UPDATE banding SET id_statusSanksi = :id_statusSanksi WHERE id_banding = :id_banding');
            $this->db->bind('id_statusSanksi', '4');
            $this->db->bind('id_banding', $id_banding);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }
    public function tolakBandingTableLaporan($id_laporan)
    {
        try {
            $this->db->query('UPDATE laporan SET id_statusSanksi = :id_statusSanksi WHERE id_laporan = :id_laporan');
            $this->db->bind('id_statusSanksi', '2');
            $this->db->bind('id_laporan', $id_laporan);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // fungsi menghitung jumlah banding mahasiswa di dashboard admin
    public function getCountMhs()
    {
        $this->db->query('SELECT COUNT(*) as total FROM banding');
        $result = $this->db->single();
        return $result['total'];
    }
}
