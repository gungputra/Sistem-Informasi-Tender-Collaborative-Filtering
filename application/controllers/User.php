<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_user'));
    //Codeigniter : Write Less Do More
  }

  function index(){
    if ($this->session->userdata('is_login')==TRUE) {
      if ($this->session->userdata['role']=='Administrator') redirect('Admin');
      else if ($this->session->userdata['role']=='Konsumen') redirect('Konsumen');
      else if ($this->session->userdata['role']=='Produsen') redirect('Produsen');
    }
    else {
      $this->load->view('Home/Login');
    }
  }

  function login(){
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $data = $this->M_user->login($username);
    if ($data) {
      if ($data['password']==$password) {
        $data['is_login']=TRUE;
        $this->session->set_userdata($data);
        if ($data['role']=='Admin') redirect('Admin');
        else if ($data['role']=='Konsumen') redirect('Konsumen');
        else if ($data['role']=='Produsen') redirect('Produsen');
      }
      else {
        $this->session->set_flashdata('error', 'Password tidak sesuai, silahkan coba kembali!');
        redirect('User');
      }
    }
    else {
      $this->session->set_flashdata('error', 'Username tidak terdaftar, silahkan masukkan username terdaftar!');
      redirect('User');
    }
  }

  function logout(){
    $this->session->sess_destroy();
    //var_dump($this->session->userdata());
    redirect('User');
  }
  function tes(){
    echo 'hahaha';
  }
}
