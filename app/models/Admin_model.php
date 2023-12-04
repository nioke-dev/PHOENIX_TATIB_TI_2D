<?php

class Admin_model
{
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAdmin()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAdminByNip($nip_admin)
    {
        $this->db->query('SELECT * FROM admin adm INNER JOIN user u ON adm.nip_admin = u.username WHERE nip_admin=:nip_admin');
        $this->db->bind('nip_admin', $nip_admin);
        return $this->db->single();
    }

    public function tambahDataAdmin($data, $id_user)
    {
        $query = "INSERT INTO admin (nip_admin, id_user, nama_admin, email_admin)
                    VALUES
                  (:nip_admin, :id_user, :nama_admin, :email_admin)";
        $this->db->query($query);
        $this->db->bind('nip_admin', $data['nip_admin']);
        $this->db->bind('id_user', $id_user['userAdminId']['id_user']);
        $this->db->bind('nama_admin', $data['nama_admin']);
        $this->db->bind('email_admin', $data['email_admin']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUserAdminByNip($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nip_admin');
        $this->db->bind('nip_admin', $data['nip_admin']);
        return $this->db->single();
    }

    public function tambahUserAdmin($data)
    {
        $query = "INSERT INTO user (username, password, user_type)
                    VALUES
                  (:username, :password, :user_type)";

        $this->db->query($query);
        $this->db->bind('username', $data['nip_admin']);
        $this->db->bind('password', md5('rahasia'));
        $this->db->bind('user_type', 'admin');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataAdmin($id)
    {
        $query = "DELETE FROM admin WHERE nip_admin = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataAdmin($data)
    {
        $query = "UPDATE admin SET
                    nama_admin = :nama_admin,
                    email_admin = :email_admin
                  WHERE nip_admin = :nip_admin";

        $this->db->query($query);
        $this->db->bind('nama_admin', $data['nama_admin']);
        $this->db->bind('email_admin', $data['email_admin']);
        $this->db->bind('nip_admin', $data['nip_admin']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataUser($data)
    {
        $query = "UPDATE user SET
                    username = :username                    
                  WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('username', $data['nip_admin']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataAdmin()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM admin WHERE nama_admin LIKE :keyword OR nip_admin LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
