<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_tender'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $tender['tender'] = $this->M_tender->get_all_tender();
    $tittle['tittle'] = 'Home';
    $this->load->view('Home/Header');
    $this->load->view('Home/Home',$tender);
    $this->load->view('Home/Home_modal');
    $this->load->view('Home/Footer',$tittle);
  }

}
