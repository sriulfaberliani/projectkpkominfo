<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Suratmasuk;
use App\Models\M_User;
use App\Models\M_JenisSurat;
use App\Models\M_Sifat;
use App\Models\M_Status;
use DateTime;
use DateTimeZone; 


class SuratMasuk extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Suratmasuk();
        $this-> user = new M_User();
        $this->jenissurat = new M_JenisSurat();
        $this->sifat = new M_Sifat();
        $this->status = new M_Status();
        helper('form');
        
    }

    public function index()
    {

        if (session()->get('id_role') !='1') {
            redirect()->to(base_url('suratmasuk'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Surat Masuk',
            'suratmasuk' => $this->model->getAllData(),
            'datauser' => $this->user->getAllData(),
            'datajenissurat' => $this->jenissurat->getAllData(),
            'datasifat' => $this->sifat->getAllData(),
            'datastatus' => $this->status->getAllData(),
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Suratmasuk/suratmasuk', $data);
        echo view('templates/v_footer');
    }

    public function statusDisposisi($id_suratmasuk){
        $detail = $this->model->detailSurat($id_suratmasuk);
        $data = [
          'title' => 'Status Disposisi',
          
        ];
        $data['detail'] = $detail;
              echo view('templates/v_header', $data);
              echo view('templates/v_sidebar');
              echo view('templates/v_topbar');
              echo view('Disposisi/statusDisposisi', $data);
              echo view('templates/v_footer');
      }

    // public function viewpdf($file_surat){
    //     $file = '/public/filesurat' . $file_surat;

    //     header('Content-type: application/pdf');
    //     header('Content-Disposition: inline; filename="' . $file_surat . '"');
    //     header('Content-Transfer-Encoding: binary');
    //     header('Accept-Ranges: bytes');
    //     @readfile($file);
    // }

    public function tambah()
    {
        $file_surat = $this->request->getFile('file_surat');
        $nama_file = $file_surat->getName();
        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
            // $timestamp = $dt->format('Y-m-d G:i:s');
        $timestamp = $dt->format('Y:m:d');
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_suratmasuk' => $this->request->getPost('id_suratmasuk'),
            'id_user' => session()->get('id_user'),
            'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
            'no_suratmasuk' => $this->request->getPost('no_suratmasuk'),
            'tgl_suratmasuk' => $timestamp,
            'agenda_suratmasuk' => $this->request->getPost('agenda_suratmasuk'),
            'file_surat' => $file_surat->getName(),
        ];
           
        //insert data
        
        $file_surat->move('public/filesurat', $file_surat->getName());
        $success = $this->model->tambah($data);
        if ($success){
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->to(base_url('suratmasuk'));
        }
    }

    public function ubah()
    {
        $id_suratmasuk = $this->request->getPost('id_suratmasuk');
        $file_surat = $this->request->getFile('file_surat');
        $nama_file = $file_surat->getName();
        $data = [
            'id_suratmasuk' => $this->request->getPost('id_suratmasuk'),
            'id_user' => session()->get('id_user'),
            'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
            'no_suratmasuk' => $this->request->getPost('no_suratmasuk'),
            'tgl_suratmasuk' => $this->request->getPost('tgl_suratmasuk'),
            'agenda_suratmasuk' => $this->request->getPost('agenda_suratmasuk'),
            'file_surat' => $this->request->getPost('file_surat'),
        ];
        
        //insert data
        $file_surat->move('public/filesurat', $file_surat->getName());
        $success = $this->model->ubah($data, $id_suratmasuk);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('suratmasuk'));
        }
    }

    public function hapus()
    {
      $id_suratmasuk = $this->request->getPost('id_suratmasuk');  

        $success = $this->model->hapus($id_suratmasuk);
        if ($success){
            session()->setFlashdata('message', ' dihapus');
            return redirect()->to(base_url('suratmasuk'));
        }
    }
}