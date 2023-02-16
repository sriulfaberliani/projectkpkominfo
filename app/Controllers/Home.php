<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Pegawai;
use App\Models\M_User;
use App\Models\M_Suratmasuk;
use App\Models\M_Suratkeluar;
use App\Models\M_Disposisi;
use App\Models\M_Disposisi_sk;



class Home extends BaseController
{
    public function __construct()
    {
      $this->pegawai = new M_Pegawai();
      $this->user = new M_User();
      $this->suratmasuk = new M_suratMasuk();
        $this->suratkeluar = new M_suratKeluar();
        $this->disposisi = new M_Disposisi();
        $this->disposisi_sk = new M_Disposisi_sk();


        
        
    }

    public function index($id = null)
    {

        $data = [
            'title' => 'Dashboard',
            'disposisi' => $this->user->getAllData(),
            'suratmasuk' => $this->suratmasuk->getAllData(),
            'datauser' => $this->user->getAllData(),
        ];
        $data['jumlah_pegawai'] = $this->pegawai->getJumlahPegawai();
        $data['jumlah_user'] = $this->user->getJumlahuser();
        $data['jumlah_suratmasuk'] = $this->suratmasuk->getJumlahSuratMasuk();
        $data['jumlah_suratkeluar'] = $this->suratkeluar->getJumlahSuratKeluar();
        $data['jumlah_disposisi'] = $this->disposisi->getJumlahDisposisi(session()->get('id_user'));
        $data['jumlah_disposisi_sk'] = $this->disposisi_sk->getJumlahDisposisiSk();

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('home/index');
        echo view('templates/v_footer');
    }
}
