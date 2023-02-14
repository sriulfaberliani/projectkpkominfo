<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Status extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('status')->where('id_status !=', 0)->get()->getResultArray();
        
    }

    public function tambah($data)
    {
        return $this->db->table('status')->insert($data);
    }

    public function ubah($data, $id_status)
    {
        return $this->db->table('status')->update($data, ['id_status' => $id_status]);
    }

    public function hapus($id_status)
    {
        return $this->db->table('status')->delete(['id_status' => $id_status]);
    }

   
}