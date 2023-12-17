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

    public function getUserDpaByNipToChangePass($data)
    {
        $this->db->query('SELECT * FROM user WHERE username = :nip_dpa');
        $this->db->bind('nip_dpa', $data);
        return $this->db->single();
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

    public function getDosenByNip($nip_dosen)
    {
        $this->db->query('
        SELECT d.*, u.*
        FROM dosen d
        LEFT JOIN user u ON d.nip_dosen = u.username
        WHERE d.nip_dosen=:nip_dosen
        GROUP BY d.nip_dosen
    ');

        $this->db->bind('nip_dosen', $nip_dosen);
        return $this->db->single();
    }

    public function ubahuserTypeUserDpa($data)
    {
        try {
            $query = "UPDATE user SET
                        user_type = :user_type                  
                      WHERE id_user = :id_user";

            $this->db->query($query);
            $this->db->bind('user_type', 'dpa');
            $this->db->bind('id_user', $data['userDpaId']['id_user']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }
    public function ubahuserTypeUserDpaForDelete($data)
    {
        try {
            $query = "UPDATE user SET
                        user_type = :user_type                  
                      WHERE id_user = :id_user";

            $this->db->query($query);
            $this->db->bind('user_type', 'dosen');
            $this->db->bind('id_user', $data['userDpaId']['id_user']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }
    public function ubahuserTypeUserDpaToDosen($data)
    {
        try {
            $query = "UPDATE user SET
                        user_type = :user_type                  
                      WHERE id_user = :id_user";

            $this->db->query($query);
            $this->db->bind('user_type', 'dosen');
            $this->db->bind('id_user', $data['userDpaId']['id_user']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk menambahkan data dpa
    public function tambahDataDpa($data, $id_user, $dataDosen)
    {
        try {
            // Query SQL untuk menambahkan data dpa
            $query = "INSERT INTO dpa (nip_dpa, id_user, nama_dpa, kelas_dpa, email_dpa)
                        VALUES
                      (:nip_dpa, :id_user, :nama_dpa, :kelas_dpa, :email_dpa)";

            // Eksekusi query
            $this->db->query($query);
            $this->db->bind('nip_dpa', $data['nip_dpa']);
            $this->db->bind('id_user', $id_user['userDpaId']['id_user']);
            $this->db->bind('nama_dpa', $dataDosen['dataDosen']['nama_dosen']);
            $this->db->bind('kelas_dpa', $data['kelas_dpa']);
            $this->db->bind('email_dpa', $dataDosen['dataDosen']['email_dosen']);
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

    public function getUserDpaByNip($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nip_dpa');
        $this->db->bind('nip_dpa', $data['nip_dpa']);
        return $this->db->single();
    }
    public function getUserDpaByNipForDelete($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nip_dpa');
        $this->db->bind('nip_dpa', $data);
        return $this->db->single();
    }

    public function tambahUserDpa($data)
    {
        try {
            $query = "INSERT INTO user (username, password, user_type)
                        VALUES
                      (:username, :password, :user_type)";

            $this->db->query($query);

            $this->db->bind('username', $data['nip_dpa']);
            $this->db->bind('password', md5('rahasia'));
            $this->db->bind('user_type', 'dpa');

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk menghapus data dpa berdasarkan NIP
    public function hapusDataDpa($nip_dpa)
    {
        try {
            // Query SQL untuk menghapus data dpa
            $query = "DELETE FROM dpa WHERE nip_dpa = :nip_dpa";

            // Eksekusi query
            $this->db->query($query);
            $this->db->bind('nip_dpa', $nip_dpa);
            $this->db->execute();

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk mengubah data dpa
    public function ubahDataDpa($data)
    {
        try {
            // Query SQL untuk mengubah data dpa     
            $query = "UPDATE dpa SET                        
                        kelas_dpa = :kelas_dpa                        
                      WHERE nip_dpa = :nip_dpa";

            // Eksekusi query
            $this->db->query($query);            
            $this->db->bind('kelas_dpa', $data['kelas_dpa_ubah']);            
            $this->db->bind('nip_dpa', $data['nip_dpa_ubah']);
            $this->db->execute();

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }
    public function ubahDataUserDpa($data)
    {
        try {
            $query = "UPDATE user SET
                        username = :username                  
                      WHERE id_user = :id_user";

            $this->db->query($query);
            $this->db->bind('username', $data['nip_dpa']);
            $this->db->bind('id_user', $data['id_user']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function hapusUserDpa($id_user)
    {
        try {
            // Query SQL untuk menghapus user
            $query = "DELETE FROM user WHERE id_user = :id_user";

            // Eksekusi query
            $this->db->query($query);
            $this->db->bind('id_user', $id_user);
            $this->db->execute();

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // fungsi menghitung total admin di dashboard Admin
    public function getCount()
    {
        $this->db->query('SELECT COUNT(*) as total FROM dpa');
        $result = $this->db->single();
        return $result['total'];
    }
}
