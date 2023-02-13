<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Disposisi extends Model{

    public function __construct(){
        $this->db = db_connect();
    }
 

    public function getAllData(){
        return $this->db->table('disposisi_sm')
        ->join('suratmasuk', 'suratmasuk.id_suratmasuk = disposisi_sm.id_suratmasuk')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratmasuk.id_jenis_surat')
        ->join('user', 'user.id_user = suratmasuk.id_user')
        ->get()->getResultArray(); 
    }

    public function getStatusData(){
        return $this->db->table('status')->where('id_status !=', 0)->get()->getResultArray();
    }

    public function getSifatDispoData(){
        return $this->db->table('sifat_dispo')->get()->getResultArray();
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