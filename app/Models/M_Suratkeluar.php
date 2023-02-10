<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Suratkeluar extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('suratkeluar') 
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratkeluar.id_jenis_surat')
        ->join('user', 'user.id_user = suratkeluar.id_user')
        ->get()->getResultArray();
    }

    public function detaildata($id_suratkeluar)
    {
        return $this->db->table('suratkeluar')
        ->where('id_suratkeluar', $id_suratkeluar)
        ->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->db->table('suratkeluar')->insert($data);
    }

    public function hapus($id_suratkeluar)
    {
        return $this->db->table('suratkeluar')->delete(['id_suratkeluar' => $id_suratkeluar]);
    }
   
}