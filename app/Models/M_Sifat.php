<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Sifat extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('sifat_dispo')->get()->getResultArray();
        
    }


    public function tambah($data)
    {
        return $this->db->table('sifat_dispo')->insert($data);
    }

    public function ubah($data, $id_sifat)
    {
        return $this->db->table('sifat_dispo')->update($data, ['id_sifat' => $id_sifat]);
    }

    public function hapus($id_sifat)
    {
        return $this->db->table('sifat_dispo')->delete(['id_sifat' => $id_sifat]);
    }

   
}