<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pegawai extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('pegawai')->get()->getResultArray();
        
    }

    public function tambah($data)
    {
        return $this->db->table('pegawai')->insert($data);
    }

    public function ubah($data, $id_pegawai)
    {
        return $this->db->table('pegawai')->update($data, ['id_pegawai' => $id_pegawai]);
    }

    public function hapus($id_pegawai)
    {
        return $this->db->table('pegawai')->delete(['id_pegawai' => $id_pegawai]);
    }
}