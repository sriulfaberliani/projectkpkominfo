<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Jabatan extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('jabatan')->get()->getResultArray();
        
    }

    public function tambah($data)
    {
        return $this->db->table('jabatan')->insert($data);
    }

    public function ubah($data, $id_jabatan)
    {
        return $this->db->table('jabatan')->update($data, ['id_jabatan' => $id_jabatan]);
    }

    public function hapus($id_jabatan)
    {
        return $this->db->table('jabatan')->delete(['id_jabatan' => $id_jabatan]);
    }
}