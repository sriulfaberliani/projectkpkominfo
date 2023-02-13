<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Suratkeluar;
use App\Models\M_User;
use App\Models\M_JenisSurat;
use App\Models\M_Sifat;
use App\Models\M_Status;
use DateTime;
use DateTimeZone;


class SuratKeluar extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Suratkeluar();
        $this-> user = new M_User();
        $this->jenissurat = new M_JenisSurat();
        $this->sifat = new M_Sifat();
        $this->status = new M_Status();
        helper('form');
        
    }

    public function index()
    {

        if (session()->get('id_role') !='1' || session()->get('id_role') !='5') {
            redirect()->to(base_url('suratkeluar'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Surat Keluar',
            'suratkeluar' => $this->model->getAllData(),
            'datauser' => $this->user->getAllData(),
            'datajenissurat' => $this->jenissurat->getAllData(),
            'datasifat' => $this->sifat->getAllData(),
            'datastatus' => $this->status->getAllData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Suratkeluar/suratkeluar', $data);
        echo view('templates/v_footer');
    }

    public function detail($id_suratkeluar)
    {
        
        $data = [
            'title' => 'Detail Surat Keluar',
        ];
        $detail= $this->model->detaildata($id_suratkeluar);

        $data['detail'] = $detail;

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Suratkeluar/detailsurat', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
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
        $tanggal = date('d').' '.$bulan[date('m')].' '.date('Y');
        $data = [
            'id_suratkeluar' => $this->request->getPost('id_suratkeluar'),
            'id_user' => session()->get('id_user'),
            'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
            'no_suratkeluar' => $this->request->getPost('no_suratkeluar'),
            'tgl_pembuatansk' => $tanggal,
            'lampiran' => $this->request->getPost('lampiran'),
            'perihal' => $this->request->getPost('perihal'),
            'tujuan_sk' => $this->request->getPost('tujuan_sk'),
            'isi_sk'=> $this->request->getPost('isi_sk'),
            'jabatan_pembuatsurat'=> $this->request->getPost('jabatan_pembuatsurat'),
            'nama_pembuatsurat'=> $this->request->getPost('nama_pembuatsurat'),
            'nip_pembuatsurat'=> $this->request->getPost('nip_pembuatsurat'),
        ];
           
        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->to(base_url('suratkeluar'));
        }
    }

    public function hapus()
    {
      $id_suratkeluar = $this->request->getPost('id_suratkeluar');  

        $success = $this->model->hapus($id_suratkeluar);
        if ($success){
            session()->setFlashdata('message', ' dihapus');
            return redirect()->to(base_url('suratkeluar'));
        }
    }

    public function ubah()
    {
        $id_suratkeluar = $this->request->getPost('id_suratkeluar');
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
        $tanggal = date('d').' '.$bulan[date('m')].' '.date('Y');
        
        $data = [
            'id_suratkeluar' => $this->request->getPost('id_suratkeluar'),
            'id_user' => session()->get('id_user'),
            'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
            'no_suratkeluar' => $this->request->getPost('no_suratkeluar'),
            'tgl_pembuatansk' => $tanggal,
            'lampiran' => $this->request->getPost('lampiran'),
            'perihal' => $this->request->getPost('perihal'),
            'tujuan_sk' => $this->request->getPost('tujuan_sk'),
            'isi_sk'=> $this->request->getPost('isi_sk'),
            'jabatan_pembuatsurat'=> $this->request->getPost('jabatan_pembuatsurat'),
            'nama_pembuatsurat'=> $this->request->getPost('nama_pembuatsurat'),
            'nip_pembuatsurat'=> $this->request->getPost('nip_pembuatsurat'),
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_suratkeluar);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('suratkeluar'));
        }
    }

    
}