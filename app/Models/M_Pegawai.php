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
}