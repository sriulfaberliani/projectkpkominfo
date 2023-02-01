<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Disposisi extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('disposisi_sm')->get()->getResultArray();   
    }

    public function tambah($data)
    {
        return $this->db->table('disposisi_sm')->insert($data);
    }

    public function hapus($id_disposisi)
    {
        return $this->db->table('disposisi_sm')->delete(['id_disposisi' => $id_disposisi]);
    }

}