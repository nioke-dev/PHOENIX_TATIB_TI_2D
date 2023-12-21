<?php

class Dosen_model
{
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserDosenByNipToChangePass($data)
    {
        $this->db->query('SELECT * FROM user WHERE username = :nip_dosen');
        $this->db->bind('nip_dosen', $data);
        return $this->db->single();
    }

    public function getAllDosenFilterDpaFound()
    {
        $this->db->query('SELECT dosen.* FROM dosen LEFT JOIN dpa ON dosen.nip_dosen = dpa.nip_dpa WHERE dpa.nip_dpa IS NULL');
        return $this->db->resultSet();
    }
    public function getAllDosenFilterDpaFoundExceptChange()
    {
        $this->db->query('SELECT * FROM dosen');
        return $this->db->resultSet();
    }


    public function getAllDosen()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDosenByNip($nip_dosen)
    {
        $this->db->query('
        SELECT d.*, u.*
        FROM ' . $this->table . ' d
        LEFT JOIN user u ON d.nip_dosen = u.username
        WHERE d.nip_dosen=:nip_dosen
        GROUP BY d.nip_dosen
    ');

        $this->db->bind('nip_dosen', $nip_dosen);
        return $this->db->single();
    }



    public function tambahDataDosen($data, $id_user)
    {
        try {
            $query = "INSERT INTO dosen (nip_dosen, id_user, nama_dosen, email_dosen)
                        VALUES
                      (:nip_dosen, :id_user, :nama_dosen, :email_dosen)";
            $this->db->query($query);
            $this->db->bind('nip_dosen', $data['nip']);
            $this->db->bind('id_user', $id_user['userDosenId']['id_user']);
            $this->db->bind('nama_dosen', $data['nama']);
            $this->db->bind('email_dosen', $data['email']);

            $this->db->execute();

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

    public function getUserDosenByNip($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nip');
        $this->db->bind('nip', $data['nip']);
        return $this->db->single();
    }

    public function tambahUserDosen($data)
    {
        try {
            $query = "INSERT INTO user (username, password, user_type)
                        VALUES
                      (:username, :password, :user_type)";

            $this->db->query($query);
            $this->db->bind('username', $data['nip']);
            $this->db->bind('password', md5('rahasia'));
            $this->db->bind('user_type', 'dosen');

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function hapusDataDosen($nip_dosen)
    {
        try {
            $query = "DELETE FROM dosen WHERE nip_dosen = :nip_dosen";

            $this->db->query($query);
            $this->db->bind('nip_dosen', $nip_dosen);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }


    public function ubahDataDosen($data)
    {
        try {
            $query = "UPDATE dosen SET
                        nama_dosen = :nama_dosen,
                        email_dosen = :email_dosen
                      WHERE nip_dosen = :nip_dosen";

            $this->db->query($query);
            $this->db->bind('nama_dosen', $data['nama']);
            $this->db->bind('email_dosen', $data['email']);
            $this->db->bind('nip_dosen', $data['nip']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function ubahDataUser($data)
    {
        try {
            $query = "UPDATE user SET
                        username = :username                    
                      WHERE id_user = :id_user";

            $this->db->query($query);
            $this->db->bind('username', $data['nip']);
            $this->db->bind('id_user', $data['id_user']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // fungsi menghitung total dosen di dashboard Admin
    public function getCountDosenAdminRole()
    {
        $this->db->query('SELECT COUNT(*) as total FROM dosen');
        $result = $this->db->single();
        return $result['total'];
    }
}
