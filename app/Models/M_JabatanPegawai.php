<?php

namespace App\Models;

use CodeIgniter\Model;

class M_JabatanPegawai extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('jabatan_pegawai')
        ->join('pegawai', 'pegawai.id_pegawai = jabatan_pegawai.id_pegawai')
        ->join('jabatan', 'jabatan.id_jabatan = jabatan_pegawai.id_jabatan')
        ->get()->getResultArray();
    }
}