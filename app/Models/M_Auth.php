<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model{

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function login($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])
        ->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai')
        ->get()->getRowArray();

        // return $this->db->table('user')
        // ->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai')
        // ->get()->getResultArray();

    }

    // public function getAllData()
    // {
    //     return $this->db->table('user')
    //     ->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai')
    //     ->get()->getResultArray();
    // }
}