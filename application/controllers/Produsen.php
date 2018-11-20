<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produsen extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_produsen','M_tender'));
    //Codeigniter : Write Less Do More
  }

  function index(){
    if ($this->session->userdata('is_login')==TRUE) {
      $tender['tender'] = $this->M_tender->get_all_tender();
      for ($i=0; $i < sizeof($tender['tender']); $i++) {
        $tender['tender'][$i]->tanggal_buka = date('d F Y', strtotime($tender['tender'][$i]->tanggal_buka));
        $tender['tender'][$i]->tanggal_tutup = date('d F Y', strtotime($tender['tender'][$i]->tanggal_tutup));
        $tender['tender'][$i]->deadline = date('d F Y', strtotime($tender['tender'][$i]->deadline));
      }
      $this->load->view('Produsen/Header');
      $this->load->view('Produsen/Beranda',$tender);
    }
    else {
      redirect('user');
    }
  }

  function profil(){

    $this->load->view('Produsen/Header');
    $this->load->view('Produsen/Profil');
  }

  function lamaran(){
    $data = $this->M_produsen->list_lamaran();
    $this->load->view('Produsen/Header');
    $this->load->view('Produsen/Lamaran', $data);
  }

  function lamar_tender(){
    $data = $this->M_produsen->lamar_tender();
    if ($data==1) {
      $this->session->set_flashdata('success', 'Berhasil Melamar Pada Tender!');
    }
    else {
      $this->session->set_flashdata('error', 'Gagal Melamar Pada Tender!');
    }
    redirect('Produsen/');
  }


}
