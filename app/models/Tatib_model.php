<?php

class Tatib_model
{
    private $table = 'tatib';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTatib()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataTatib($data)
    {
        $query = "INSERT INTO tatib (deskripsi)
                    VALUES
                  (:deskripsi)";

        $this->db->query($query);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getTatibById($data)
    {
        $this->db->query('
            SELECT t.id_tatib, t.deskripsi, s.id_tingkatSanksi
            FROM ' . $this->table . ' t
            INNER JOIN tingkatSanksi s ON t.id_tingkatSanksi = s.id_tingkatSanksi
            WHERE t.id_tatib = :id_tatib
            GROUP BY t.id_tatib
        ');

        $this->db->bind('id_tatib', $data['id_tatib']);
        return $this->db->single();
    }

    public function ubahDataTatib($data)
    {
        $query = "UPDATE tatib SET
                    deskripsi = :deskripsi       
                  WHERE id_tatib = :id_tatib";

        $this->db->query($query);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id_tatib', $data['id_tatib']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataTatib()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tatib WHERE deskripsi LIKE :keyword OR id_tingkatSanksi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function hapusDataTatib($id)
    {
        $query = "DELETE FROM tatib WHERE id_tatib = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    
}
