<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Suratmasuk extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('suratmasuk') 
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratmasuk.id_jenis_surat')
        ->join('user', 'user.id_user = suratmasuk.id_user')
        ->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('suratmasuk')->insert($data);
    }

    public function hapus($id_suratmasuk)
    {
        return $this->db->table('suratmasuk')->delete(['id_suratmasuk' => $id_suratmasuk]);
    }

    public function ubah($data, $id_suratmasuk)
    {
        return $this->db->table('suratmasuk')->update($data, ['id_suratmasuk' => $id_suratmasuk]);
    }
   

   
}