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
        ->orderBy('disposisi_sk.id_disposisi_sk', 'DESC')
        ->get()->getResultArray(); 
    }
    
    public function get_disposisi_by_id_user($id_user_login, $id_pegawai_login)
    {
        $disposisi = $this->db->table('disposisi_sk')
            ->join('suratkeluar', 'suratkeluar.id_suratkeluar = disposisi_sk.id_suratkeluar')
            ->join('jenissurat', 'jenissurat.id_jenis_surat = suratkeluar.id_jenis_surat')
            ->join('user', 'user.id_user = suratkeluar.id_user')
            ->join('status', 'status.id_status = disposisi_sk.id_status')
            ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sk.id_sifat')
            ->orderBy('disposisi_sk.id_disposisi_sk', 'DESC')
            ->Where('disposisi_sk.tujuan_dispo_sk', $id_user_login)
            ->orWhere('disposisi_sk.id_pegawai', $id_pegawai_login)
            ->groupBy('suratkeluar.id_suratkeluar');
        return $disposisi->get()->getResultArray();
    }
    
    public function get_disposisi_sk_by_id_sk($id_suratkeluar)
    {
        return $this->db->table('disposisi_sk')
        ->join('suratkeluar', 'suratkeluar.id_suratkeluar = disposisi_sk.id_suratkeluar')
        ->join('pegawai', 'pegawai.id_pegawai = disposisi_sk.id_pegawai')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratkeluar.id_jenis_surat')
        ->join('user', 'user.id_user = suratkeluar.id_user')
        ->join('status', 'status.id_status = disposisi_sk.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sk.id_sifat')
        ->orderBy('disposisi_sk.id_disposisi_sk', 'DESC')
            ->where(array('suratkeluar.id_suratkeluar' => $id_suratkeluar))
            ->get()->getResultArray();
    }



    public function get_disposisi_agenda()
    {
        return $this->db->table('disposisi_sk')
        ->join('suratkeluar', 'suratkeluar.id_suratkeluar = disposisi_sk.id_suratkeluar')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratkeluar.id_jenis_surat')
        ->join('user', 'user.id_user = suratkeluar.id_user')
        ->join('status', 'status.id_status = disposisi_sk.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sk.id_sifat')
        ->orderBy('disposisi_sk.id_disposisi_sk', 'DESC')
            ->where('disposisi_sk.id_pegawai','2' )
            ->where('status.id_status','1' )
            ->get()->getResultArray();
    }

    public function getJumlahDisposisiSk($id_user_login, $id_pegawai_login){
        return $this->db->table('disposisi_sk')
            ->where('disposisi_sk.tujuan_dispo_sk', $id_user_login)
            ->orWhere('disposisi_sk.id_pegawai', $id_pegawai_login)
            ->groupBy('disposisi_sk.id_suratkeluar')
            ->countAllResults();
    }
    


   

}