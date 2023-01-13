<?php

namespace App\Controllers;
use App\Models\M_Auth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Auth = new M_Auth();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );

        echo view('auth/login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong!'
                ]
            ]
        ])) {
            //jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->M_Auth->login($username, $password);
            if ($cek) {
                //jika data cocok
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('id_user', $cek['id_user']);
                session()->set('id_pegawai', $cek['id_pegawai']);
                session()->set('id_role', $cek['id_role']);
                session()->set('nama_pegawai', $cek['nama_pegawai']);
                session()->set('last_login', $cek['last_login']);
                //login
                return redirect()->to(base_url('home'));
            } else {
                //jika data tidak cocok
                session()->setFlashdata('pesan', 'Login Gagal!! Username dan password tidak cocok!');
                return redirect()->to(base_url('Auth/login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('password');
        session()->remove('id_user');
        session()->remove('id_pegawai');
        session()->remove('id_role');
        session()->remove('last_login');
        return redirect()->to(base_url('Auth/login'));
    }

    


}

