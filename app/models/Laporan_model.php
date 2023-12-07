<?php

class Laporan_model
{
    private $table = 'banding';
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    // Fungsi untuk mendapatkan semua data laporan banding
    public function getAllPelanggaran()
    {
        $this->db->query('SELECT laporan.id_laporan, laporan.tgl_laporan, laporan.nim_mahasiswa, laporan.nip_dosen FROM laporan 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN dosen ON laporan.nip_dosen = dosen.nip_dosen
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi
        WHERE laporan.nim_mahasiswa = :nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $_SESSION['user_id']);
        return $this->db->resultSet();
    }

    // Fungsi untuk mengajukan banding
    public function ajukanBandingMhs($data)
    {
        $query = "INSERT INTO banding (nim_mahasiswa, id_laporan, nip_dosen, deskripsi)
                    VALUES
                  (:nim_mahasiswa, :nip_dosen, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('nim_mahasiswa', $_SESSION['user_id']);
        $this->db->bind('id_laporan', '2');
        $this->db->bind('nip_dosen', $data['nip_dosen']);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getBandingById($data)
    {
        $this->db->query('SELECT * FROM banding WHERE id_banding=:id_banding');
        $this->db->bind('id_banding', $data['id_banding']);
        return $this->db->single();
    }

    public function cariDataBanding()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM banding WHERE deskripsi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
