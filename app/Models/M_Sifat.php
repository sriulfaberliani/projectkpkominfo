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

   
}