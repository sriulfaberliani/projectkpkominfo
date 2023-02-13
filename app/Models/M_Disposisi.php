<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Disposisi extends Model{

    public function __construct(){
        $this->db = db_connect();
    }
 

    public function tambah($data)
    {
        return $this->db->table('disposisi_sm')->insert($data);
    }

    public function getAllData(){
        return $this->db->table('disposisi_sm')
        ->join('suratmasuk', 'suratmasuk.id_suratmasuk = disposisi_sm.id_suratmasuk')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratmasuk.id_jenis_surat')
        ->join('user', 'user.id_user = suratmasuk.id_user')
        ->join('status', 'status.id_status = disposisi_sm.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sm.id_sifat')
        ->get()->getResultArray(); 
    }

 
    public function get_disposisi_by_id_user($id_user)
    {
        return $this->db->table('disposisi_sm')
        ->join('suratmasuk', 'suratmasuk.id_suratmasuk = disposisi_sm.id_suratmasuk')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratmasuk.id_jenis_surat')
        ->join('user', 'user.id_user = suratmasuk.id_user')
        ->join('status', 'status.id_status = disposisi_sm.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sm.id_sifat')
            ->where('tujuan_dispo_sm', $id_user)
            ->get()->getResultArray();
    }
    
   

}