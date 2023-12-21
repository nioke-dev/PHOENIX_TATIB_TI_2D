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

    public function getUserMahasiswaByNimToChangePass($data)
    {
        $this->db->query('SELECT * FROM user WHERE username = :nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $data);
        return $this->db->single();
    }

    // Fungsi untuk mendapatkan semua data mahasiswa
    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id_user ASC');
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
        try {
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
        } catch (\PDOException $e) {
            // Duplicate entry handling
            if ($e->getCode() == '23000') {
                return -1; // Indicates a duplicate entry
            } else {
                throw $e; // Re-throw other exceptions
            }
        }
    }


    public function getUserMahasiswaByNim($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        return $this->db->single();
    }

    public function tambahUserMahasiswa($data)
    {
        try {
            $query = "INSERT INTO user (username, password, user_type)
                        VALUES
                      (:username, :password, :user_type)";

            $this->db->query($query);
            $this->db->bind('username', $data['nim_mahasiswa']);
            $this->db->bind('password', md5('rahasia'));
            $this->db->bind('user_type', 'mahasiswa');

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk menghapus data mahasiswa berdasarkan NIM
    public function hapusDataMahasiswa($nim_mahasiswa)
    {
        // Query SQL untuk menghapus data mahasiswa
        try {
            $query = "DELETE FROM mahasiswa WHERE nim_mahasiswa = :nim_mahasiswa";

            // Eksekusi query
            $this->db->query($query);
            $this->db->bind('nim_mahasiswa', $nim_mahasiswa);
            $this->db->execute();

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk mengubah data mahasiswa
    public function ubahDataMahasiswa($data)
    {

        try {
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
        } catch (\PDOException $e) {
            return -1;
        }
    }
    public function ubahDataUserMahasiswa($data)
    {
        try {
            $query = "UPDATE user SET
                        username = :username
                      WHERE id_user = :id_user";

            $this->db->query($query);
            $this->db->bind('username', $data['nim_mahasiswa']);
            $this->db->bind('id_user', $data['id_user']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi menghitung total Mahasiswa di Dashboard Admin
    public function getCountMahasiswaAdminRole()
    {
        $this->db->query('SELECT COUNT(*) as total FROM mahasiswa');
        $result = $this->db->single();
        return $result['total'];
    }
}
