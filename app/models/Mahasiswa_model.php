<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    // Fungsi untuk mendapatkan semua data mahasiswa
    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id_user DESC');
        return $this->db->resultSet();
    }

    // Fungsi untuk mendapatkan data mahasiswa berdasarkan NIM
    public function getMahasiswaByNim($nim_mahasiswa)
    {
        $this->db->query('SELECT * FROM mahasiswa m INNER JOIN user u ON m.nim_mahasiswa = u.username WHERE nim_mahasiswa=:nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $nim_mahasiswa);
        return $this->db->single();
    }

    // Fungsi untuk menambahkan data mahasiswa
    public function tambahDataMahasiswa($data, $id_user)
    {
        // Query SQL untuk menambahkan data mahasiswa
        $query = "INSERT INTO mahasiswa (nim_mahasiswa, id_user, nama_mahasiswa, kelas_mahasiswa, prodi_mahasiswa, email_mahasiswa)
                    VALUES
                  (:nim_mahasiswa, :id_user, :nama_mahasiswa, :kelas_mahasiswa, :prodi_mahasiswa, :email_mahasiswa)";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        $this->db->bind('id_user', $id_user['userMahasiswaId']['id_user']);
        $this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
        $this->db->bind('kelas_mahasiswa', $data['kelas_mahasiswa']);
        $this->db->bind('prodi_mahasiswa', $data['prodi_mahasiswa']);
        $this->db->bind('email_mahasiswa', $data['email_mahasiswa']);
        $this->db->execute();

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
        return $this->db->rowCount();
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
        $this->db->bind('password', $data['password']);
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
    public function ubahDataMahasiswa($data)
    {
        // Query SQL untuk mengubah data mahasiswa        
        $query = "UPDATE mahasiswa SET
                    nama_mahasiswa = :nama_mahasiswa,
                    kelas_mahasiswa = :kelas_mahasiswa,
                    prodi_mahasiswa = :prodi_mahasiswa,
                    email_mahasiswa = :email_mahasiswa
                  WHERE nim_mahasiswa = :nim_mahasiswa";

        // Eksekusi query
        $this->db->query($query);
        $this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
        $this->db->bind('kelas_mahasiswa', $data['kelas_mahasiswa']);
        $this->db->bind('prodi_mahasiswa', $data['prodi_mahasiswa']);
        $this->db->bind('email_mahasiswa', $data['email_mahasiswa']);
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        $this->db->execute();

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
        return $this->db->rowCount();
    }
    public function ubahDataUserMahasiswa($data)
    {
        $query = "UPDATE user SET
                    username = :username,
                    password = :password
                  WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('username', $data['nim_mahasiswa']);
        $this->db->bind('password', $data['password']);
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
