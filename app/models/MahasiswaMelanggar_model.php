<?php

class MahasiswaMelanggar_model
{
    private $table = 'mahasiswaMelanggar';
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    // Fungsi untuk mendapatkan semua data mahasiswa
    public function getAllMahasiswaMelanggar()
    {
        $this->db->query('SELECT mahasiswa.*, status_sanksi, tingkat_sanksi FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON mahasiswaMelanggar.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN statusSanksi ON mahasiswaMelanggar.id_statusSanksi = statusSanksi.id_statusSanksi
        INNER JOIN tingkatSanksi ON mahasiswaMelanggar.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi');

        return $this->db->resultSet();
    }

    public function getAllMahasiswaMelanggarFilterKelas($data)
    {
        $this->db->query('SELECT mahasiswa.*, status_sanksi, tingkat_sanksi FROM ' . $this->table . ' 
            INNER JOIN mahasiswa ON mahasiswaMelanggar.nim_mahasiswa = mahasiswa.nim_mahasiswa
            INNER JOIN statusSanksi ON mahasiswaMelanggar.id_statusSanksi = statusSanksi.id_statusSanksi
            INNER JOIN tingkatSanksi ON mahasiswaMelanggar.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi');


        return $this->db->resultSet();
    }

    public function getDpaKelas($nip_dpa)
    {
        $this->db->query('SELECT * FROM dpa WHERE nip_dpa=:nip_dpa');
        $this->db->bind('nip_dpa', $nip_dpa);
        return $this->db->single();
    }




    // Fungsi untuk mendapatkan data mahasiswa berdasarkan NIM
    public function getMahasiswaMelanggarByNim($nim_mahasiswa)
    {
        $this->db->query('SELECT mahasiswa.*, status_sanksi, tingkatSanksi.* FROM mahasiswaMelanggar 
        INNER JOIN mahasiswa ON mahasiswaMelanggar.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN statusSanksi ON mahasiswaMelanggar.id_statusSanksi = statusSanksi.id_statusSanksi
        INNER JOIN tingkatSanksi ON mahasiswaMelanggar.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
        WHERE mahasiswaMelanggar.nim_mahasiswa=:nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $nim_mahasiswa);
        return $this->db->single();
    }

    public function getUserMahasiswaByNim($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        return $this->db->single();
    }

    public function tambahUserMahasiswa($data)
    {
        $query = "INSERT INTO user (username, password, user_type)
                    VALUES
                  (:username, :password, :user_type)";

        $this->db->query($query);
        $this->db->bind('username', $data['nim_mahasiswa']);
        $this->db->bind('password', md5('rahasia'));
        $this->db->bind('user_type', 'mahasiswa');

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Fungsi untuk menghapus data mahasiswa berdasarkan NIM
    public function hapusDataMahasiswa($nim_mahasiswa)
    {
        // Query SQL untuk menghapus data mahasiswa
        $query = "DELETE FROM mahasiswa WHERE nim_mahasiswa = :nim_mahasiswa";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('nim_mahasiswa', $nim_mahasiswa);
        $this->db->execute();

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
        return $this->db->rowCount();
    }

    // Fungsi untuk mengubah data mahasiswa
    public function ubahDataMahasiswaMelanggar($data)
    {
        // Query SQL untuk mengubah data mahasiswa        
        $query = "UPDATE mahasiswaMelanggar SET
                    id_tingkatSanksi = :id_tingkatSanksi                  
                  WHERE nim_mahasiswa = :nim_mahasiswa";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('id_tingkatSanksi', $data['id_tingkatSanksi']);
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        $this->db->execute();

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
        return $this->db->rowCount();
    }

    public function ubahDataUserMahasiswa($data)
    {
        $query = "UPDATE user SET
                    username = :username
                  WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('username', $data['nim_mahasiswa']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Fungsi untuk mencari data mahasiswa berdasarkan keyword
    public function cariDataMahasiswa()
    {
        // Mendapatkan keyword dari form pencarian
        $keyword = $_POST['keyword'];

        // Query SQL untuk mencari data mahasiswa berdasarkan nama atau NIM
        $query = "SELECT * FROM mahasiswa WHERE nama_mahasiswa LIKE :keyword OR nim_mahasiswa LIKE :keyword";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        // Mengembalikan hasil query dalam bentuk array
        return $this->db->resultSet();
    }
}