<?php

class MahasiswaMelanggar_model
{
    private $table = 'mahasiswaMelanggar';
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = new Database;
    }

    // Fungsi untuk mendapatkan semua data mahasiswa
    public function getAllMahasiswaMelanggar()
    {
        $this->db->query('SELECT mahasiswa.*, status_sanksi, tingkat_sanksi FROM ' . $this->table . ' 
        INNER JOIN mahasiswa ON mahasiswaMelanggar.nim_mahasiswa = mahasiswa.nim_mahasiswa
        INNER JOIN statusSanksi ON mahasiswaMelanggar.id_statusSanksi = statusSanksi.id_statusSanksi
        INNER JOIN tingkatSanksi ON mahasiswaMelanggar.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi');

        return $this->db->resultSet();
    }

    public function getAllMahasiswaMelanggarFilterKelas($data)
    {
        $this->db->query('SELECT mahasiswa.*, status_sanksi, tingkat_sanksi FROM ' . $this->table . ' 
            INNER JOIN mahasiswa ON mahasiswaMelanggar.nim_mahasiswa = mahasiswa.nim_mahasiswa
            INNER JOIN statusSanksi ON mahasiswaMelanggar.id_statusSanksi = statusSanksi.id_statusSanksi
            INNER JOIN tingkatSanksi ON mahasiswaMelanggar.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
            WHERE mahasiswa.kelas_mahasiswa = :kelas_dpa');
        $this->db->bind('kelas_dpa', $data['kelas_dpa']);
        return $this->db->resultSet();
    }

    public function getDpaKelas($nip_dpa)
    {
        $this->db->query('SELECT * FROM dpa WHERE nip_dpa=:nip_dpa');
        $this->db->bind('nip_dpa', $nip_dpa);
        return $this->db->single();
    }


    // Fungsi untuk mendapatkan data mahasiswa berdasarkan NIM
    public function getMahasiswaMelanggarByNim($nim_mahasiswa)
    {
        $this->db->query('SELECT mahasiswa.*, laporan.*, status_sanksi, tingkatSanksi.*, laporan.file_bukti AS file_bukti,
        (SELECT COUNT(*) FROM laporan WHERE nim_mahasiswa = :nim_mahasiswa AND id_statusSanksi != 4) AS jumlahPelanggaran
FROM mahasiswaMelanggar 
INNER JOIN mahasiswa ON mahasiswaMelanggar.nim_mahasiswa = mahasiswa.nim_mahasiswa
INNER JOIN statusSanksi ON mahasiswaMelanggar.id_statusSanksi = statusSanksi.id_statusSanksi
INNER JOIN tingkatSanksi ON mahasiswaMelanggar.id_tingkatSanksi = tingkatSanksi.id_tingkatSanksi
INNER JOIN laporan ON mahasiswaMelanggar.id_laporan = laporan.id_laporan
WHERE mahasiswaMelanggar.nim_mahasiswa=:nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $nim_mahasiswa);
        return $this->db->single();
    }

    public function getUserMahasiswaByNim($data)
    {
        $this->db->query('SELECT * FROM user WHERE username=:nim_mahasiswa');
        $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
        return $this->db->single();
    }

    public function tambahUserMahasiswa($data)
    {

        try {
            $query = "INSERT INTO user (username, password, user_type)
                        VALUES
                      (:username, :password, :user_type)";

            $this->db->query($query);
            $this->db->bind('username', $data['nim_mahasiswa']);
            $this->db->bind('password', md5('rahasia'));
            $this->db->bind('user_type', 'mahasiswa');

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk menghapus data mahasiswa berdasarkan NIM
    public function hapusDataMahasiswa($nim_mahasiswa)
    {

        try {
            // Query SQL untuk menghapus data mahasiswa
            $query = "DELETE FROM mahasiswa WHERE nim_mahasiswa = :nim_mahasiswa";

            // Eksekusi query
            $this->db->query($query);
            $this->db->bind('nim_mahasiswa', $nim_mahasiswa);
            $this->db->execute();

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // Fungsi untuk mengubah data mahasiswa
    public function ubahDataMahasiswaMelanggar($data)
    {

        try {
            // Query SQL untuk mengubah data mahasiswa        
            $query = "UPDATE mahasiswaMelanggar SET
                        id_tingkatSanksi = :id_tingkatSanksi                  
                      WHERE nim_mahasiswa = :nim_mahasiswa";

            // Eksekusi query
            $this->db->query($query);
            $this->db->bind('id_tingkatSanksi', $data['id_tingkatSanksi']);
            $this->db->bind('nim_mahasiswa', $data['nim_mahasiswa']);
            $this->db->execute();

            // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    public function ubahDataUserMahasiswa($data)
    {

        try {
            $query = "UPDATE user SET
                        username = :username
                      WHERE id_user = :id_user";

            $this->db->query($query);
            $this->db->bind('username', $data['nim_mahasiswa']);
            $this->db->bind('id_user', $data['id_user']);

            $this->db->execute();

            return $this->db->rowCount();
        } catch (\PDOException $e) {
            return -1;
        }
    }

    // fungsi menghitung jumlah mahasiswa melanggar di dashboard admin
    public function getCountMhs()
    {
        $this->db->query('SELECT COUNT(*) as total FROM mahasiswaMelanggar');
        $result = $this->db->single();
        return $result['total'];
    }
}
