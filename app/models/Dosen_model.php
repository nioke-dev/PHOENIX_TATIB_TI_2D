<?php 

class Dosen_model {
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

    public function getDosenById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataDosen($data)
    {
        $query = "INSERT INTO dosen
                    VALUES
                  ('', :nama, :nip, :matkul)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('matkul', $data['matkul']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataDosen($id)
    {
        $query = "DELETE FROM dosen WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataDosen($data)
    {
        $query = "UPDATE dosen SET
                    nama = :nama,
                    nip = :nip,
                    matkul = :matkul
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('matkul', $data['matkul']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM dosen WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}