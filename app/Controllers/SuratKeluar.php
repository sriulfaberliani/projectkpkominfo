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

        if (session()->get('id_role') =='3' || session()->get('id_role') =='4') {
            redirect()->to(base_url('suratkeluar'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Surat Keluar',
            'suratkeluar' => $this->model->getAllData(),
            'datauser' => $this->user->getAllData(),
            'userjabatan' => $this->user->getUserJabatan(),
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
        if($this->validate([
            'id_jenis_surat' => [
                'label' => 'Jenis Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'no_suratkeluar' => [
                'label' => 'Nomor Surat',
                'rules' => 'required|regex_match[/^\d{3}\/302\/Diskominfo\/[A-Z]+\/\d{4}$/]|is_unique[suratkeluar.no_suratkeluar]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'regex_match' => 'Format nomor surat tidak sesuai (contoh: 023/304/Diskominfo/XI/2022)',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required|regex_match[/^[1-9\-]+$/]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'regex_match' => '{field} hanya boleh terdiri dari angka jumlah lampiran, dan jika tidak ada lampiran, maka isi dengan "-"'
                ]
            ],
            'tgl_pembuatansk' => [
                'label' => 'Tanggal Surat',
                'rules' => 'required|regex_match[/^\d{1,2} [a-zA-Z]+ \d{4}$/]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'regex_match' => '{field} harus dalam format dd MMMM yyyy, misalnya 12 Februari 2023',
                    ]
            ],
            'perihal' => [
                'label' => 'Perihal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tujuan_sk' => [
                'label' => 'Tujuan Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'isi_sk' => [
                'label' => 'Isi Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'nama_pembuatsurat' => [
                'label' => 'Nama Pembuat Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ])){
            //jika valid
            $data = [
                'id_suratkeluar' => $this->request->getPost('id_suratkeluar'),
                'id_user' => session()->get('id_user'),
                'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
                'no_suratkeluar' => $this->request->getPost('no_suratkeluar'),
                'tgl_pembuatansk' => $this->request->getPost('tgl_pembuatansk'),
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
        }else{
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
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

        if ($this->validate([
            'id_jenis_surat' => [
                'label' => 'Jenis Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'no_suratkeluar' => [
                'label' => 'Nomor Surat',
                'rules' => 'required|regex_match[/^\d{3}\/302\/Diskominfo\/[A-Z]+\/\d{4}$/]|is_unique[suratkeluar.no_suratkeluar]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'regex_match' => 'Format nomor surat tidak sesuai (contoh: 023/304/Diskominfo/XI/2022)',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required|regex_match[/^[1-9\-]+$/]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'regex_match' => '{field} hanya boleh terdiri dari angka jumlah lampiran, dan jika tidak ada lampiran, maka isi dengan "-"'
                ]
            ],
            'tgl_pembuatansk' => [
                'label' => 'Tanggal Surat',
                'rules' => 'required|regex_match[/^\d{1,2} [a-zA-Z]+ \d{4}$/]',
                'valid_date[d/m/Y]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'regex_match' => '{field} harus dalam format dd MMMM yyyy, misalnya 12 Februari 2023',
                    'valid_date' => '{field} harus merupakan tanggal yang valid'
                    ]
            ],
            'perihal' => [
                'label' => 'Perihal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tujuan_sk' => [
                'label' => 'Tujuan Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'isi_sk' => [
                'label' => 'Isi Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'nama_pembuatsurat' => [
                'label' => 'Nama Pembuat Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ])){ 
            //jika valid
        $data = [
            'id_suratkeluar' => $this->request->getPost('id_suratkeluar'),
            'id_user' => session()->get('id_user'),
            'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
            'no_suratkeluar' => $this->request->getPost('no_suratkeluar'),
            'tgl_pembuatansk' => $this->request->getPost('tgl_pembuatansk'),
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
    }else{
        //jika tidak valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('suratkeluar'));

    }
}

    

    
}