<?php

class Matkul_model
{
    private $table = 'matkul';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatkul()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataMatkul($data)
    {
        $query = "INSERT INTO matkul (nip_dosen, matkul)
                    VALUES
                  (:nip_dosen, :matkul)";
        $this->db->query($query);
        $this->db->bind('nip_dosen', $data['nip_dosen']);
        $this->db->bind('matkul', $data['nama_matkul']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMatkulById_Matkul($data)
    {
        $this->db->query('SELECT * FROM matkul WHERE id_matkul=:id_matkul');
        $this->db->bind('id_matkul', $data['id_matkul']);
        return $this->db->single();
    }
}
