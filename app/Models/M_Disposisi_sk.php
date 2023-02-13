<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Disposisi_sk extends Model{

    public function __construct(){
        $this->db = db_connect();
    }
 

    public function tambah($data)
    {
        return $this->db->table('disposisi_sk')->insert($data);
    }

    public function getAllData(){
        return $this->db->table('disposisi_sk')
        ->join('suratkeluar', 'suratkeluar.id_suratkeluar = disposisi_sk.id_suratkeluar')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratkeluar.id_jenis_surat')
        ->join('user', 'user.id_user = suratkeluar.id_user')
        ->join('status', 'status.id_status = disposisi_sk.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sk.id_sifat')
        ->get()->getResultArray(); 
    }
    
   

}