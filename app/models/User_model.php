<?php
class User_model
{
    // private $nama = 'Nurul Mustofa';

    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        if (isset($_SESSION['user_id'])) {
            $user_type = $_SESSION['user_type'];
            $user_id = $_SESSION['user_id'];
            $query = "SELECT nama_$user_type FROM $user_type WHERE id_user = :user_id";
            $this->db->query($query);
            $this->db->bind(':user_id', $user_id);

            return $this->db->single();
        }
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        return $this->db->single();
    }

    public function changePassword($data)
    {
        $query = "UPDATE user SET
                    password = :password                 
                  WHERE username = :username";

        $this->db->query($query);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('username', $_SESSION['username']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
