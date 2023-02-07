<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Suratmasuk;
use App\Models\M_User;
use App\Models\M_JenisSurat;
use App\Models\M_Disposisi;
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
      helper('form');
        
    }

    public function index()
    {

        
      $data = [
        'title' => 'Disposisi',
        'disposisi' => $this->model->getAllData(),
        'suratmasuk' => $this->suratmasuk->getAllData(),
        'datauser' => $this->user->getAllData(),
        'datajenissurat' => $this->jenissurat->getAllData()

      ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Disposisi/index', $data);
        echo view('templates/v_footer');
    }

    public function statusDisposisi($id_suratmasuk){
      $detail = $this->suratmasuk->detailSurat($id_suratmasuk);
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
     
    public function buatDisposisi(){
     
      $data = [
        'title' => 'Disposisi',
        
      ];
            echo view('templates/v_header', $data);
            echo view('templates/v_sidebar');
            echo view('templates/v_topbar');
            echo view('Disposisi/buatDisposisi');
            echo view('templates/v_footer');
    }

    public function tolakDisposisi(){
     
      $data = [
        'title' => 'Tolak Disposisi',
        
      ];
            echo view('templates/v_header', $data);
            echo view('templates/v_sidebar');
            echo view('templates/v_topbar');
            echo view('Disposisi/tolakDisposisi');
            echo view('templates/v_footer');
    }

}



// <table class = "table">
//       <tr>
//         <th>No Surat</th>
//         <td><?php echo $detail['no_suratmasuk'] ?></td>



<!-- <div class="container">
    <div class="row">
        <div class="col-md-12"><p class="h3 mb-2 text-gray-800">Timeline Disposisi</p>
            <div class="card">
            
                <div class="card-body">
                    
                    <div id="content">
                        <ul class="timeline">
                            <li class="event" >
                                <h5>Sekretaris Diskominfo payakumbuh menyetujui disposisi</h5>
                                <p>yth kepala dinas Diskominfo payakumbuh mohon untuk menyetujui izin kerja praktek.</p>
                            </li>
                            <li class="event" >
                                <h5>Kabag Umum Diskominfo payakumbuh menyetujui disposisi</h5>
                                <p>Diteruskan Kepada Sekretaris Dinas, Mohon diteruskan kepada Kepala Dinas Diskominfo Kota Payakumbuh</p>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
 

