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
        $this->db->query('
            SELECT tt.id_tatib, tt.deskripsi, ts.tingkat_sanksi, tt.id_tingkatSanksi
            FROM ' . $this->table . ' tt
            INNER JOIN tingkatSanksi ts ON tt.id_tingkatSanksi = ts.id_tingkatSanksi            
            ORDER BY tt.id_tingkatSanksi DESC, tt.id_tatib ASC
        ');
        return $this->db->resultSet();
    }

    public function tambahDataTatib($data)
    {

        try {
            $query = "INSERT INTO tatib (deskripsi, id_tingkatSanksi)
                        VALUES
                      (:deskripsi, :id_tingkatSanksi)";

            $this->db->query($query);
            $this->db->bind('deskripsi', $data['deskripsi']);
            $this->db->bind('id_tingkatSanksi', $data['id_tingkatSanksi']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function getTatibById($data)
    {
        $this->db->query('
            SELECT tt.id_tatib, tt.deskripsi, ts.tingkat_sanksi, ts.id_tingkatSanksi
            FROM ' . $this->table . ' tt
            INNER JOIN tingkatSanksi ts ON tt.id_tingkatSanksi = ts.id_tingkatSanksi
            WHERE tt.id_tatib = :id_tatib
        ');

        $this->db->bind('id_tatib', $data['id_tatib']);
        return $this->db->single();
    }

    public function ubahDataTatib($data)
    {
        try {
            $query = "UPDATE tatib SET
                        deskripsi = :deskripsi,
                        id_tingkatSanksi = :id_tingkatSanksi       
                      WHERE id_tatib = :id_tatib";

            $this->db->query($query);
            $this->db->bind('deskripsi', $data['deskripsi']);
            $this->db->bind('id_tingkatSanksi', $data['id_tingkatSanksi']);
            $this->db->bind('id_tatib', $data['id_tatib']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function cariDataTatib()
    {
        $keyword = $_POST['keyword'];
        $query = "
        SELECT t.*, ts.tingkat_sanksi
        FROM tatib t
        INNER JOIN tingkatSanksi ts ON t.id_tingkatSanksi = ts.id_tingkatSanksi
        WHERE t.deskripsi LIKE :keyword
    ";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function hapusDataTatib($id)
    {
        try {
            $query = "DELETE FROM tatib WHERE id_tatib = :id";

            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

        // fungsi menghitung jumlah mahasiswa melanggar di dashboard admin
        public function getCountTatibAdminRole()
        {
            $this->db->query('SELECT COUNT(*) as total FROM tatib');
            $result = $this->db->single();
            return $result['total'];
        }
}
