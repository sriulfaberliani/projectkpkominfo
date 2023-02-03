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

    }

    public function getLoggedInUserData($id)
    {
        $builder = $this->db->table('user');
        $builder->where('id_user',$id);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
        else
        {
            return false;
        }
    }

    public function change_password($npwd,$id){
        $builder = $this->db->table('user');
        $builder->where('id_user',$id);
        $builder->update(['password'=>$npwd]);
        if($this->db->affectedRows()>0){
            return true;
        }
        else{
            return false;
        }
    }
   
}