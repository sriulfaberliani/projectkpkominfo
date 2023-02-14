<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Suratmasuk;
use App\Models\M_User;
use App\Models\M_JenisSurat;
use App\Models\M_Disposisi;
use App\Models\M_Sifat;
use App\Models\M_Status;
use DateTime;
use DateTimeZone; 


class Disposisi extends BaseController
{

    public function __construct()
    {
      $this->model = new M_Disposisi();
      $this->suratmasuk = new M_Suratmasuk();
      $this-> user = new M_User();
      $this->jenissurat = new M_JenisSurat();
      $this->sifat = new M_Sifat();
      $this->status = new M_Status();
      helper('form');
        
    }

    public function index($id = null)
    {

      $suratmasuk = new M_Suratmasuk();
      $data = [
        'title' => 'Disposisi',
        'disposisi' => $this->model->getAllData(),
        'suratmasuk' => $this->suratmasuk->getAllData(),
        'datauser' => $this->user->getAllData(),
        'datajenissurat' => $this->jenissurat->getAllData(),
        'datasifat' => $this->sifat->getAllData(),
        'datastatus' => $this->status->getAllData(),
   
      ];
      $data['disposisi_sm'] = $this->model->get_disposisi_by_id_user(session()->get('id_user'));
      echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Disposisi/index', $data);
        echo view('templates/v_footer');

    }

    public function statusDisposisi($id_suratmasuk){
      $detail = $this->suratmasuk->detailSurat($id_suratmasuk);

      $data = [
        'title' => 'Status Disposisi',
        'datauser' => $this->user->getAllData(),
        'datasifat' => $this->sifat->getAllData(),
        'disposisi' => $this->model->getAllData(),
        'userjabatan' => $this->user->getUserJabatan()
        
        
      ];
      $data['datastatus'] = $this->status->getAllData();
      
      $data['detail'] = $detail;
      $data['disposisi_by_id_suratmasuk'] = $this->model->get_disposisi_by_id_suratmasuk($id_suratmasuk);
            echo view('templates/v_header', $data);
            echo view('templates/v_sidebar');
            echo view('templates/v_topbar');
            echo view('Disposisi/statusDisposisi', $data);
            echo view('templates/v_footer');

            
    }


    public function teruskan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        $tanggal = date('d').' '.$bulan[date('m')].' '.date('Y'). ' ' .date('H:i:s');
        $id_suratmasuk = $this->request->getPost('id_suratmasuk');  
        $data = [
            'id_disposisi_sm' => $this->request->getPost('id_disposisi_sm'),
            'id_suratmasuk' => $this->request->getPost('id_suratmasuk'),
            'id_pegawai' => session()->get('id_pegawai'),
            'id_status' => $this->request->getPost('id_status'),
            'id_sifat' => $this->request->getPost('id_sifat'),
            'tanggal_disposisi_sm' => $tanggal,
            'catatan_sm' => $this->request->getPost('catatan_sm'),
            'tujuan_dispo_sm' => $this->request->getPost('tujuan_dispo_sm'),
            ];
           
        //insert data
        $success = $this->model->tambah($data, $id_suratmasuk);
        if ($success){
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->back()->with('foo', 'message');
        }
    }
    
     
}
 

