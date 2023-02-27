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

 
    public function get_disposisi_by_id_user($id_user_tujuan, $id_user_pembuat)
    {
        return $this->db->table('disposisi_sm')
        ->join('suratmasuk', 'suratmasuk.id_suratmasuk = disposisi_sm.id_suratmasuk')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratmasuk.id_jenis_surat')
        ->join('user', 'user.id_user = suratmasuk.id_user')
        ->join('status', 'status.id_status = disposisi_sm.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sm.id_sifat')
        ->where('tujuan_dispo_sm', $id_user_tujuan)
        ->orderBy('suratmasuk.id_suratmasuk', 'DESC')
        ->orWhere('suratmasuk.id_user', $id_user_pembuat)
        ->groupby('suratmasuk.id_suratmasuk')
        ->get()->getResultArray();
}

//     public function getLastStatus($id_suratmasuk)
//     {
//         $table = $this->db->table('disposisi_sm');
// if ($table === false) {
//     die("Failed to get table object: " . $this->db->error()['message']);
// }

// $result = $table->select('id_disposisi, id_suratmasuk, id_status')
//                 ->where('id_suratmasuk', $id_suratmasuk)
//                 ->orderBy('id_disposisi', 'DESC')
//                 ->limit(1)
//                 ->get()
//                 ->getResultArray();

    //     return $this->db->table('disposisi_sm')
    //         ->select('id_status','id_disposisi, id_suratmasuk')
    //         ->where('id_suratmasuk', $id_suratmasuk)
    //         ->orderBy('id_disposisi', 'DESC')
    //         ->limit(1)
    //         ->get()
    //         ->getResultArray();
    // }
    

    public function get_disposisi_by_id_suratmasuk($id_suratmasuk)
    {
        return $this->db->table('disposisi_sm')
        ->join('suratmasuk', 'suratmasuk.id_suratmasuk = disposisi_sm.id_suratmasuk')
        ->join('pegawai', 'pegawai.id_pegawai = disposisi_sm.id_pegawai')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratmasuk.id_jenis_surat')
        ->join('user', 'user.id_user = suratmasuk.id_user')
        ->join('status', 'status.id_status = disposisi_sm.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sm.id_sifat')
            ->where('suratmasuk.id_suratmasuk', $id_suratmasuk)
            ->orderBy('disposisi_sm.id_disposisi_sm', 'DESC')
            ->get()->getResultArray();
    }

    public function getJumlahDisposisi($id_user_tujuan, $id_user_pembuat)
    {
        return $this->db->table('disposisi_sm')
        ->where('tujuan_dispo_sm', $id_user_tujuan)
        ->orderBy('suratmasuk.id_suratmasuk', 'DESC')
        ->orWhere('suratmasuk.id_user', $id_user_pembuat)
        ->groupby('suratmasuk.id_suratmasuk')
        ->countAllResult();
    }

    public function sudahDispoByUser($id_user){
        return $this->db->table('disposisi_sm')
        ->join('suratmasuk', 'suratmasuk.id_suratmasuk = disposisi_sm.id_suratmasuk')
        ->join('jenissurat', 'jenissurat.id_jenis_surat = suratmasuk.id_jenis_surat')
        ->join('user', 'user.id_user = suratmasuk.id_user')
        ->join('status', 'status.id_status = disposisi_sm.id_status')
        ->join('sifat_dispo', 'sifat_dispo.id_sifat = disposisi_sm.id_sifat')
        ->where('disposisi_sm.id_pegawai', $id_user)
        ->whereIn('disposisi_sm.id_status', [1, 3])
        ->where('disposisi_sm.catatan_sm IS NOT NULL')
        ->get()->getResultArray();

        $status = false;
    if (empty($data)) {
        $status = true;
    }

    return array('data' => $data, 'status' => $status);

}


}