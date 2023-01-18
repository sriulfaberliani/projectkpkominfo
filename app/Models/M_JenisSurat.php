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

    public function ubah($data, $id_jenisSurat)
    {
        return $this->db->table('jenissurat')->update($data, ['id_jenisSurat' => $id_jenisSurat]);
    }

    public function hapus($id_jenisSurat)
    {
        return $this->db->table('jenissurat')->delete(['id_jenisSurat' => $id_jenisSurat]);
    }
}