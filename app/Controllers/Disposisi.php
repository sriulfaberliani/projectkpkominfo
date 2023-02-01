<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Disposisi extends BaseController
{

    public function __construct()
    {
        
        
    }

    public function index()
    {

        
      $data = [
        'title' => 'Disposisi',
        
      ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Disposisi/index', $data);
        echo view('templates/v_footer');
    }

    public function statusDisposisi(){

      $data = [
        'title' => 'Status Disposisi',
        
      ];
            echo view('templates/v_header', $data);
            echo view('templates/v_sidebar');
            echo view('templates/v_topbar');
            echo view('Disposisi/statusDisposisi');
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