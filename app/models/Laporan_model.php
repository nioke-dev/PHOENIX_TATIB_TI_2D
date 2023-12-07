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

    // Function to get all Laporan data
    public function getAllLaporan()
    {
        $this->db->query('SELECT laporan.*, mahasiswa.*, tingkatSanksi.*, statusSanksi.* FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi');
        return $this->db->resultSet();
    }

    // Function to get Laporan data by ID
    public function getLaporanById($id_laporan)
    {
        $this->db->query('SELECT laporan.*, mahasiswa.*, tingkatSanksi.tingkat_sanksi AS tingkat_sanksi, statusSanksi.status_sanksi AS status_sanksi FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON laporan.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN tingkatSanksi ON laporan.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        INNER JOIN statusSanksi ON laporan.id_statusSanksi = statusSanksi.id_statusSanksi WHERE laporan.id_laporan = :id_laporan');

        $this->db->bind('id_laporan', $id_laporan);

        return $this->db->single();
    }


    // Function to add Laporan data
    public function tambahDataLaporan($data)
    {
        // SQL query to add Laporan data
        $query = "INSERT INTO laporan (tgl_laporan, nim_mahasiswa, nip_dosen, deskripsi, id_tingkatSanksi, id_statusSanksi)
                    VALUES
                  (:tgl_laporan :nim_mahasiswa, :nip_dosen, :deskripsi, :tingkat_sanksi, :status_sanksi)";

        // Execute the query
        $this->db->query($query);
        $dateTimeNow = date("Y-m-d H:i:s");
        $this->db->bind('tgl_laporan', $dateTimeNow);
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        $this->db->bind('nip_dosen', $_SESSION['username']);
        $this->db->bind('tingkat_sanksi', $data['tingkat_sanksi']);
        $this->db->bind('status_sanksi', '1');
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->execute();

        // Return the number of affected rows by the query operation
        return $this->db->rowCount();
    }

    // Function to delete Laporan data by ID
    public function hapusDataLaporan($id_laporan)
    {
        // SQL query to delete Laporan data
        $query = "DELETE FROM laporan WHERE id_laporan = :id_laporan";

        // Execute the query
        $this->db->query($query);
        $this->db->bind('id_laporan', $id_laporan);
        $this->db->execute();

        // Return the number of affected rows by the query operation
        return $this->db->rowCount();
    }

    // Function to update Laporan data
    public function ubahDataLaporan($data)
    {
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
    }

    // Function to search Laporan data by keyword
    public function cariDataLaporan()
    {
        // Get the keyword from the search form
        $keyword = $_POST['keyword'];

        // SQL query to search Laporan data by name or ID
        $query = "SELECT * FROM laporan WHERE nim_mahasiswa LIKE :keyword OR id_laporan LIKE :keyword";

        // Execute the query
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        // Return the query results as an array
        return $this->db->resultSet();
    }
}
