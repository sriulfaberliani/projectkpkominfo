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
        ->orderBy('suratkeluar.id_suratkeluar', 'DESC')
        ->get()->getResultArray();
    }

    public function detailSurat_sk($id_suratkeluar = NULL){
        $query = $this->db->table('suratkeluar') -> where (array('id_suratkeluar' => $id_suratkeluar))->get()->getRowArray();
        return $query;
        
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

    public function ubah($data, $id_suratkeluar)
    {
        return $this->db->table('suratkeluar')->update($data, ['id_suratkeluar' => $id_suratkeluar]);
    }

    public function getSuratkeluar($id)
    {
        return $this->where(['id_suratkeluar' => $id])->first();
    }

    public function getJumlahSuratkeluar()
    {
        return $this->db->table('suratkeluar')
        ->join('disposisi_sk', 'disposisi_sk.id_suratkeluar = suratkeluar.id_suratkeluar')
        ->where('disposisi_sk.id_status','1' )
        ->countAllResults();
    }

    public function get_disposisi_by_id_user($id_user_pembuat)
    {
        return $this->db->table('suratkeluar') 
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratkeluar.id_jenis_surat')
        ->join('user', 'user.id_user = suratkeluar.id_user')
        ->orderBy('suratkeluar.id_suratkeluar', 'DESC')
            ->Where('suratkeluar.id_user', $id_user_pembuat)
            ->get()->getResultArray();
    }
}