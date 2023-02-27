<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Suratkeluar;
use App\Models\M_User;
use App\Models\M_JenisSurat;
use App\Models\M_Disposisi_sk;
use App\Models\M_Sifat;
use App\Models\M_Status;
use DateTime;
use DateTimeZone; 


class DisposisiSk extends BaseController
{

    public function __construct()
    {
      $this->model = new M_Disposisi_sk();
      $this->suratkeluar = new M_Suratkeluar();
      $this-> user = new M_User();
      $this->jenissurat = new M_JenisSurat();
      $this->sifat = new M_Sifat();
      $this->status = new M_Status();
      helper('form');
        
    }

    public function index($id = null)
    {

      $suratkeluar = new M_Suratkeluar();
      $data = [
        'title' => 'Disposisi',
        'disposisi_sk' => $this->model->getAllData(),
        'suratkeluar' => $this->suratkeluar->getAllData(),
        'datauser' => $this->user->getAllData(),
        'userjabatan' => $this->user->getUserJabatan(),
        'datajenissurat' => $this->jenissurat->getAllData(),
        'datasifat' => $this->sifat->getAllData(),
        'datastatus' => $this->status->getAllData(),

      ];
      $id_user = session()->get('id_user');
      $id_pegawai = session()->get('id_pegawai');
      $data['disposisi_sk_by_user'] = $this->model->get_disposisi_by_id_user($id_user, $id_pegawai);
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Disposisi_sk/index', $data);
        echo view('templates/v_footer');

    }

    public function statusDisposisi_sk($id_suratkeluar){
        $detail = $this->suratkeluar->detailSurat_sk($id_suratkeluar);
  
        $data = [
          'title' => 'Status Disposisi',
          'datauser' => $this->user->getAllData(),
          'datasifat' => $this->sifat->getAllData(),
          'disposisi_sk' => $this->model->getAllData(),
          'userjabatan' => $this->user->getUserJabatan(),
        ];
        $data['datastatus'] = $this->status->getAllData();
        
        $data['detail'] = $detail;
        $data['disposisi_sk_by_id_sk'] = $this->model->get_disposisi_sk_by_id_sk($id_suratkeluar);
      
              echo view('templates/v_header', $data);
              echo view('templates/v_sidebar');
              echo view('templates/v_topbar');
              echo view('Disposisi_sk/statusDisposisi_sk', $data);
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
        $tanggal = date('d').' '.$bulan[date('m')].' '.date('Y'). ' ' . date('H:i:s');;
        $id_suratkeluar = $this->request->getPost('id_suratkeluar');  
        $data = [
            'id_disposisi_sk' => $this->request->getPost('id_disposisi_sk'),
            'id_suratkeluar' => $this->request->getPost('id_suratkeluar'),
            'id_pegawai' => session()->get('id_pegawai'),
            'id_status' => $this->request->getPost('id_status'),
            'id_sifat' => $this->request->getPost('id_sifat'),
            'tgl_disposisi_sk' => $tanggal,
            'catatan_sk' => $this->request->getPost('catatan_sk'),
            'tujuan_dispo_sk' => $this->request->getPost('tujuan_dispo_sk'),
            ];
           
        //insert data
        $success = $this->model->tambah($data, $id_suratkeluar);
        if ($success){
            session()->setFlashdata('message', ' didisposisi');
            return redirect()->back()->with('foo', 'message');
        }

        
    }

    public function index_agenda($id = null)
    {

      $suratkeluar = new M_Suratkeluar();
      $data = [
        'title' => 'Disposisi',
        'disposisi_sk' => $this->model->getAllData(),
        'suratkeluar' => $this->suratkeluar->getAllData(),
        'datauser' => $this->user->getAllData(),
        'datajenissurat' => $this->jenissurat->getAllData(),
        'datasifat' => $this->sifat->getAllData(),
        'datastatus' => $this->status->getAllData(),
        'userjabatan' => $this->user->getUserJabatan(),

      ];
      $data['suratkeluar_agenda'] = $this->model->get_disposisi_agenda();
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('SuratKeluar/agendask', $data);
        echo view('templates/v_footer');

    }

    
     
}
 

