<?php

namespace App\Models;

use CodeIgniter\Model;

class M_JenisSurat extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('jenissurat')->get()->getResultArray();
        
    }

    public function tambah($data)
    {
        return $this->db->table('jenissurat')->insert($data);
    }

    public function ubah($data, $id_jenis_surat)
    {
        return $this->db->table('jenissurat')->update($data, ['id_jenis_surat' => $id_jenis_surat]);
    }

    public function hapus($id_jenis_surat)
    {
        return $this->db->table('jenissurat')->delete(['id_jenis_surat' => $id_jenis_surat]);
    }
}