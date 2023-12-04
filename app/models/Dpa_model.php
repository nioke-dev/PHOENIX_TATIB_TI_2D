<?php

class Dpa_model
{
    private $table = 'dpa';
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    // Fungsi untuk mendapatkan semua data dpa
    public function getAllDpa()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY kelas_dpa ASC');
        return $this->db->resultSet();
    }

    // Fungsi untuk mendapatkan data dpa berdasarkan NIP
    public function getDpaByNip($nip_dpa)
    {
        $this->db->query('SELECT * FROM dpa dp INNER JOIN user u ON dp.nip_dpa = u.username WHERE nip_dpa=:nip_dpa');
        $this->db->bind('nip_dpa', $nip_dpa);
        return $this->db->single();
    }

    // Fungsi untuk menambahkan data dpa
    public function tambahDataDpa($data, $id_user)
    {
        // Query SQL untuk menambahkan data dpa
        $query = "INSERT INTO dpa (nip_dpa, id_user, nama_dpa, kelas_dpa, email_dpa)
                    VALUES
                  (:nip_dpa, :id_user, :nama_dpa, :kelas_dpa, :email_dpa)";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('nip_dpa', $data['nip_dpa']);
        $this->db->bind('id_user', $id_user['userDpaId']['id_user']);
        $this->db->bind('nama_dpa', $data['nama_dpa']);
        $this->db->bind('kelas_dpa', $data['kelas_dpa']);
        $this->db->bind('email_dpa', $data['email_dpa']);
        $this->db->execute();

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
        return $this->db->rowCount();
    }

    public function getUserDpaByNip($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nip_dpa');
        $this->db->bind('nip_dpa', $data['nip_dpa']);
        return $this->db->single();
    }

    public function tambahUserDpa($data)
    {
        $query = "INSERT INTO user (username, password, user_type)
                    VALUES
                  (:username, :password, :user_type)";

        $this->db->query($query);

        $this->db->bind('username', $data['nip_dpa']);
        $this->db->bind('password', md5('rahasia'));
        $this->db->bind('user_type', 'dpa');

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Fungsi untuk menghapus data dpa berdasarkan NIP
    public function hapusDataDpa($nip_dpa)
    {
        // Query SQL untuk menghapus data dpa
        $query = "DELETE FROM dpa WHERE nip_dpa = :nip_dpa";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('nip_dpa', $nip_dpa);
        $this->db->execute();

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
        return $this->db->rowCount();
    }

    // Fungsi untuk mengubah data dpa
    public function ubahDataDpa($data)
    {
        // Query SQL untuk mengubah data dpa     
        $query = "UPDATE dpa SET
                    nama_dpa = :nama_dpa,
                    kelas_dpa = :kelas_dpa,
                    email_dpa = :email_dpa
                  WHERE nip_dpa = :nip_dpa";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('nama_dpa', $data['nama_dpa']);
        $this->db->bind('kelas_dpa', $data['kelas_dpa']);
        $this->db->bind('email_dpa', $data['email_dpa']);
        $this->db->bind('nip_dpa', $data['nip_dpa']);
        $this->db->execute();

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
        return $this->db->rowCount();
    }
    public function ubahDataUserDpa($data)
    {
        $query = "UPDATE user SET
                    username = :username,                  
                  WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('username', $data['nip_dpa']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Fungsi untuk mencari data dpa berdasarkan keyword
    public function cariDataDpa()
    {
        // Mendapatkan keyword dari form pencarian
        $keyword = $_POST['keyword'];

        // Query SQL untuk mencari data dpa berdasarkan nama atau NIP
        $query = "SELECT * FROM dpa WHERE nama_dpa LIKE :keyword OR nip_dpa LIKE :keyword OR kelas_dpa LIKE :keyword OR email_dpa LIKE :keyword";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        // Mengembalikan hasil query dalam bentuk array
        return $this->db->resultSet();
    }
}
