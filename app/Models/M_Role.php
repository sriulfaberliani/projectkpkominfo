<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Role extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('role')->get()->getResultArray();
        
    }

    public function tambah($data)
    {
        return $this->db->table('role')->insert($data);
    }

    public function ubah($data, $id_role)
    {
        return $this->db->table('role')->update($data, ['id_role' => $id_role]);
    }

    public function hapus($id_role)
    {
        return $this->db->table('role')->delete(['id_role' => $id_role]);
    }
}