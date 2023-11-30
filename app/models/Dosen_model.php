<?php

class Dosen_model
{
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDosen()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDosenByNip($nip_dosen)
    {
        $this->db->query('
        SELECT d.*, u.*, IFNULL(GROUP_CONCAT(m.matkul SEPARATOR ", "), "Tidak ada matkul") as matkul
        FROM ' . $this->table . ' d
        LEFT JOIN user u ON d.nip_dosen = u.username
        LEFT JOIN matkul m ON d.nip_dosen = m.nip_dosen
        WHERE d.nip_dosen=:nip_dosen
        GROUP BY d.nip_dosen
    ');

        $this->db->bind('nip_dosen', $nip_dosen);
        return $this->db->single();
    }



    public function tambahDataDosen($data, $id_user)
    {
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
    }

    public function getUserDosenByNip($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nip');
        $this->db->bind('nip', $data['nip']);
        return $this->db->single();
    }

    public function tambahUserDosen($data)
    {
        $query = "INSERT INTO user (username, password, user_type)
                    VALUES
                  (:username, :password, :user_type)";

        $this->db->query($query);
        $this->db->bind('username', $data['nip']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('user_type', 'dosen');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahMatkulDosen($data)
    {
        $query = "INSERT INTO matkul (nip_dosen, matkul)
                    VALUES
                  (:nip_dosen, :matkul)";

        $this->db->query($query);
        $this->db->bind('nip_dosen', $data['nip']);
        $this->db->bind('matkul', $data['matkul']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataDosen($id)
    {
        $query = "DELETE FROM dosen WHERE nip_dosen = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataDosen($data)
    {
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
    }

    public function ubahDataUser($data)
    {
        $query = "UPDATE user SET
                    username = :username,
                    password = :password
                  WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('username', $data['nip']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataDosen()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM dosen WHERE nama_dosen LIKE :keyword OR nip_dosen LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
