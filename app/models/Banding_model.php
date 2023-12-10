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

    // Fungsi untuk mendapatkan semua data laporan banding
    public function getAllBanding()
    {
        $this->db->query('SELECT banding.*, status_sanksi FROM banding INNER JOIN statusSanksi ON banding.id_statusSanksi = statusSanksi.id_statusSanksi');
        return $this->db->resultSet();
    }

    // public function getAllBandingByDosen($data)
    // {
    //     // $this->db->query('SELECT b.*, s.status_sanksi, d.nip_dosen FROM banding b
    //     // INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
    //     // INNER JOIN dosen d ON b.nip_dosen = d.nip_dosen');
    //     // return $this->db->resultSet();

    //     $this->db->query('SELECT b.*, s.status_sanksi, d.nip_dosen, l.id_laporan FROM banding b
    //     INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
    //     INNER JOIN dosen d ON b.nip_dosen = d.nip_dosen
    //     INNER JOIN laporan l on b.id_laporan = l.id_laporan
    //     WHERE d.nip_dosen = :nip_dosen');
    //     $this->db->bind('nip_dosen', $data['nip_dosen']);
    //     return $this->db->resultSet();
    // }

    public function getAllBandingByDosen($data)
    {
        // if (isset($data['nip_dosen'])) {
        $this->db->query('SELECT b.*, s.status_sanksi, d.nip_dosen, l.id_laporan FROM banding b
            INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
            INNER JOIN dosen d ON b.nip_dosen = d.nip_dosen
            INNER JOIN laporan l on b.id_laporan = l.id_laporan
            WHERE d.nip_dosen = :nip_dosen');
        $this->db->bind('nip_dosen', $data['nip_dosen']);
        // } else {
        //     $this->db->query('SELECT b.*, s.status_sanksi, d.nip_dosen, l.id_laporan FROM banding b
        //     INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
        //     INNER JOIN dosen d ON b.nip_dosen = d.nip_dosen
        //     INNER JOIN laporan l on b.id_laporan = l.id_laporan');
        // }
        return $this->db->resultSet();
    }

    // public function getAllBandingByDpa($data)
    // {



    // }

    public function getAllBandingByMahasiswa($data)
    {
        // if (isset($data['nim_mahasiswa'])) {
        $this->db->query('SELECT b.*, s.status_sanksi, m.nim_mahasiswa, l.id_laporan FROM banding b
            INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
            INNER JOIN mahasiswa m ON b.nim_mahasiswa = m.nim_mahasiswa
            INNER JOIN laporan l on b.id_laporan = l.id_laporan
            WHERE m.nim_mahasiswa = :nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        // } else {
        //     $this->db->query('SELECT b.*, s.status_sanksi, m.nim_mahasiswa, l.id_laporan FROM banding b
        //     INNER JOIN statusSanksi s ON b.id_statusSanksi = s.id_statusSanksi
        //     INNER JOIN mahasiswa m ON b.nim_mahasiswa = m.nim_mahasiswa
        //     INNER JOIN laporan l on b.id_laporan = l.id_laporan');
        // }
        return $this->db->resultSet();
    }

    // Fungsi untuk menghapus banding
    public function hapusDataBanding($id_banding)
    {
        $query = "DELETE FROM banding WHERE id_banding = :id_banding";

        $this->db->query($query);
        $this->db->bind('id_banding', $id_banding);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Fungsi untuk mengajukan banding
    // public function ajukanBandingMhs($data)
    // {
    //     $query = "INSERT INTO banding (nim_mahasiswa, id_laporan, nip_dosen, deskripsi)
    //                 VALUES
    //               (:nim_mahasiswa, :id_laporan, :nip_dosen, :deskripsi)";
    //     $this->db->query($query);
    //     $this->db->bind('nim_mahasiswa', $_SESSION['user_id']);
    //     $this->db->bind('id_laporan', $data['id_laporan']);
    //     $this->db->bind('nip_dosen', $data['nip_dosen']);
    //     $this->db->bind('deskripsi', $data['deskripsi']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    public function getBandingById($data)
    {
        $this->db->query('SELECT * FROM banding WHERE id_banding=:id_banding');
        $this->db->bind('id_banding', $data['id_banding']);
        return $this->db->single();
    }

    public function cariDataBanding()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM banding WHERE id_laporan LIKE :keyword OR nip_dosen LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}