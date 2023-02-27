<?php

namespace App\Models;

use CodeIgniter\Model;

class M_JabatanPegawai extends Model{

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('jabatan_pegawai')
        ->join('pegawai', 'pegawai.id_pegawai = jabatan_pegawai.id_pegawai')
        ->join('jabatan', 'jabatan.id_jabatan = jabatan_pegawai.id_jabatan')
        ->orderBy('jabatan_pegawai.id_jabatan_pegawai', 'DESC')
        ->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('jabatan_pegawai')->insert($data);
    }

    public function hapus($id_jabatan_pegawai)
    {
        return $this->db->table('jabatan_pegawai')->delete(['id_jabatan_pegawai' => $id_jabatan_pegawai]);
    }

    public function ubah($data, $id_jabatan_pegawai)
    {
        return $this->db->table('jabatan_pegawai')->update($data, ['id_jabatan_pegawai' => $id_jabatan_pegawai]);
    }
}