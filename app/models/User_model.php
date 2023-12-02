<?php

class User_model
{
    private $nama = 'Nurul Mustofa';

    private $table = 'matkul';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        return $this->nama;
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        
        $userData = $this->db->single();

        // Verify the password
        if ($userData && password_verify($password, $userData['password'])) {
            return $userData;
        } else {
            return false;
        }
    }
}
