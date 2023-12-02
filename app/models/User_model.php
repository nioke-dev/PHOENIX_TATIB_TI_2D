<?php

class User_model
{
    private $nama = 'Nurul Mustofa';

    private $table = 'user';
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
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        return $this->db->single();
    }
}
