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

        if (session()->get('id_role') =='6') {
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
            'userjabatan' => $this->user->getUserJabatan(),
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
        if($this->validate([
            'no_suratmasuk' => [
                'label' => 'No Surat Masuk',
                'rules' => 'required|max_length[50]|is_unique[suratmasuk.no_suratmasuk]',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} Maksimal 50 karakter!!',
                    'is_unique' => '{field} Sudah ada!!'
                    ]
                ],
            'perihal_sm' => [
                'label' => 'Perihal Surat Masuk',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} Maksimal 50 karakter!!'
                    ]
                ],
             'agenda_suratmasuk' => [
                'label' => 'Agenda Surat Masuk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi!!'
                    ]
                ],
            'file_surat' => [
                'label' => 'File Surat',
                'rules' => 'uploaded[file_surat]|max_size[file_surat,2048]|ext_in[file_surat,pdf]',
                'errors' => [
                    'uploaded' => '{field} Harus diisi!!',
                    'max_size' => '{field} Maksimal 2 MB!!',
                    'ext_in' => '{field} Harus berformat PDF!!'
                    ]
                ],

                
        ]))
        {
            //Jika valid
            $file_surat = $this->request->getFile('file_surat');
        $nama_file = $file_surat->getName();
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
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_suratmasuk' => $this->request->getPost('id_suratmasuk'),
            'id_user' => session()->get('id_user'),
            'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
            'no_suratmasuk' => $this->request->getPost('no_suratmasuk'),
            'tgl_suratmasuk' => $tanggal,
            'perihal_sm' => $this->request->getPost('perihal_sm'),
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
        } else {
            //Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratmasuk'));
        }
    }

    public function ubah()
    {
        if($this->validate([
            'no_suratmasuk' => [
                'label' => 'No Surat Masuk',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} Maksimal 50 karakter!!',
                    'is_unique' => '{field} Sudah ada!!'
                    ]
                ],
            'perihal_sm' => [
                'label' => 'Perihal Surat Masuk',
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} Maksimal 50 karakter!!'
                    ]
                ],
             'agenda_suratmasuk' => [
                'label' => 'Agenda Surat Masuk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi!!'
                    ]
                ],
            'file_surat' => [
                'label' => 'File Surat',
                'rules' => 'max_size[file_surat,2048]|ext_in[file_surat,pdf]',
                'errors' => [
                    'max_size' => '{field} Maksimal 2 MB!!',
                    'ext_in' => '{field} Harus berformat PDF!!'
                    ]
                ],

                
        ]))
        {
            //Jika valid
            $id_suratmasuk = $this->request->getPost('id_suratmasuk');
            $file_surat = $this->request->getFile('file_surat');
            $nama_file = $file_surat->getName();
            $data = [
                'id_suratmasuk' => $this->request->getPost('id_suratmasuk'),
                'id_user' => session()->get('id_user'),
                'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
                'no_suratmasuk' => $this->request->getPost('no_suratmasuk'),
                'perihal_sm' => $this->request->getPost('perihal_sm'),
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
        } else {
            //Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
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