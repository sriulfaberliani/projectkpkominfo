<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Status extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('status')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('status')->insert($data);
    }

    public function ubah($data, $id_status)
    {
        return $this->db->table('status')->update($data, ['id_status' => $id_status]);
    }

    public function hapus($id_status)
    {
        return $this->db->table('status')->delete(['id_status' => $id_status]);
    }

    public function getDatabyUser(){
        return $this->db->table('status')
        ->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai')
        ->join('jabatan_pegawai', 'jabatan_pegawai.id_pegawai = user.id_pegawai')
        ->join('jabatan', 'jabatan.id_jabatan = jabatan_pegawai.id_jabatan')
        ->get()->getResultArray();
    }

   
}