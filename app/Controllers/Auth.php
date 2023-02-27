<?php

namespace App\Controllers;
use App\Models\M_Auth;
use App\Models\M_User;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->M_Auth = new M_Auth();
        $this->model = new M_User();
        $this->session = session();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );

        echo view('auth/login',$data);
    }

    public $login;
    public $session;

    public function cek_login()
    {
        $data =[];
        if ($this->request->getMethod() == 'post') 
        {
            $rules = [
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
                ],
            ];

            if ($this->validate($rules))
            {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                $userdata = $this->M_Auth->login($username, $password);
                if($userdata)
                {
                    session()->set('log', $userdata['id_user']);
                    session()->set('username', $userdata['username']);
                    session()->set('id_user', $userdata['id_user']);
                    session()->set('id_pegawai', $userdata['id_pegawai']);
                    session()->set('id_role', $userdata['id_role']);
                    session()->set('nama_pegawai', $userdata['nama_pegawai']);
                    return redirect()->to(base_url('home'));
                }
                else 
                {
                    session()->setFlashdata('pesan', 'Login Gagal!! Username dan password tidak cocok!');
                    return redirect()->to(base_url('Auth/login'));
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view('auth/login',$data);
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('password');
        session()->remove('id_user');
        session()->remove('id_pegawai');
        session()->remove('id_role');
        session()->destroy();
        return redirect()->to(base_url('Auth/login'));
    }    

    public function change_password()
    {
        $data = [
            'title' => 'Change Password',
        ];
        $data['userdata'] = $this->M_Auth->getLoggedInUserData(session()->get('log'));
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'opwd' =>'required',
                'npwd' => 'required|min_length[6]|max_length[16]',
                'cnpwd' =>'required|matches[npwd]',
                
            ];
            if($this->validate($rules))
            {
                $opwd = $this->request->getPost('opwd');

                $cek = $this->M_Auth->login(session()->get('username'), $opwd);
                
                if($cek){
                    $npwd = $this->request->getPost('npwd');
                   
                    if($this->M_Auth->change_password($npwd,session()->get('id_user')))
                    {
                        session()->setTempdata('success','Password berhasil diganti',3);
                        return redirect()->to(current_url());
                    }
                    else
                    {
                        session()->setTempdata('error','Tidak dapat mengganti Password, Coba Lagi!',3);
                        return redirect()->to(current_url());
                    }
                }
                else{
                    session()->setTempdata('error', 'Password lama tidak sesuai', 3);
                    return redirect()->to(current_url());
                }
                 
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        return view('auth/change_password',$data);
        echo view('templates/v_footer');
    }
}

