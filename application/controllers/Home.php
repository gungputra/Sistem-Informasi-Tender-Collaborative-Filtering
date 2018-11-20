<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_tender'));
    //Codeigniter : Write Less Do More
  }

  function index(){
    $tender['tender'] = $this->M_tender->get_all_tender();
    for ($i=0; $i < sizeof($tender['tender']); $i++) {
      $tender['tender'][$i]->tanggal_buka = date('d F Y', strtotime($tender['tender'][$i]->tanggal_buka));
      $tender['tender'][$i]->tanggal_tutup = date('d F Y', strtotime($tender['tender'][$i]->tanggal_tutup));
      $tender['tender'][$i]->deadline = date('d F Y', strtotime($tender['tender'][$i]->deadline));
    }
    $this->load->view('Home/Header');
    $this->load->view('Home/Beranda',$tender);
  }

  function tes(){
    $sekarang = date('Y-m-d');
    $sekarang = date('d F Y',strtotime($sekarang));
    $sekarang = date('Y-m-d',strtotime($sekarang));
    echo $sekarang;

  }

}
