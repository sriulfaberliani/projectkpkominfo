<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model{

    public function __construct(){
        $this->db = db_connect();
    }

    public function getAllData(){
        return $this->db->table('user')
        ->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai')
        ->join('role', 'role.id_role = user.id_role')
        ->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('user')->insert($data);
    }

    public function hapus($id_user)
    {
        return $this->db->table('user')->delete(['id_user' => $id_user]);
    }

    public function ubah($data, $id_user)
    {
        return $this->db->table('user')->update($data, ['id_user' => $id_user]);
    }

    public function getUserJabatan()
    {
        return $this->db->table('user')
        ->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai')
        ->join('jabatan_pegawai', 'jabatan_pegawai.id_pegawai = user.id_pegawai')
        ->join('jabatan', 'jabatan.id_jabatan = jabatan_pegawai.id_jabatan')
        ->get()->getResultArray();
    }
   
}