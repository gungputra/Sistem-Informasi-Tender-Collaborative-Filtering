<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_tender','M_produsen'));
  }

  function index(){
    if ($this->session->userdata('is_login')==TRUE) {
      $this->load->view('Konsumen/Header');
      $this->load->view('Konsumen/Beranda');
    }
    else {
      redirect('user');
    }
  }

  function Tender(){
    if ($this->session->userdata('is_login')==TRUE) {
      $data['tender'] = $this->M_tender->get_my_tender();
      for ($i=0; $i < sizeof($data['tender']); $i++) {
        $data['tender'][$i]->deadline = date('d F Y', strtotime($data['tender'][$i]->deadline));
        $data['tender'][$i]->tanggal_buka = date('d F Y', strtotime($data['tender'][$i]->tanggal_buka));
        $data['tender'][$i]->tanggal_tutup = date('d F Y', strtotime($data['tender'][$i]->tanggal_tutup));
      }
      $this->load->view('Konsumen/Header');
      $this->load->view('Konsumen/Tender',$data);
    }
    else {
      redirect('user');
    }
  }

  function ajax_get_list_pelamar(){
    $data = $this->M_produsen->get_list_pelamar();
    echo json_encode($data);
  }

  function edit_tender(){
    echo $this->input->post('deskripsi');
  }

}
