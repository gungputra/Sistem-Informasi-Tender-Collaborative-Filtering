<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tender extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_tender'));
    //Codeigniter : Write Less Do More
  }

  function add_tender(){
    $data = $this->M_tender->add_tender();
    if ($data=='berhasil') {
      $this->session->set_flashdata('success', 'Tender baru telah ditambahkan!');
    }
    else {
      $this->session->set_flashdata('error', 'Gagal menambah tender!');
    }
    redirect('Konsumen/Tender');
  }

  function ajax_get_detail_tender(){
    $data = $this->M_tender->get_detail_tender();
    if ($this->input->post('type')=='produsen') {
      $data->deadline = date('d F Y',strtotime($data->deadline));
      $data->tanggal_buka = date('d F Y',strtotime($data->tanggal_buka));
      $data->tanggal_tutup = date('d F Y',strtotime($data->tanggal_tutup));
      $this->db->select('username_produsen');
      $this->db->where('id_tender', $this->input->post('id_tender'));
      $this->db->where('username_produsen', $this->session->userdata('username'));
      if ($this->db->get('tb_lamaran')->result()) $data->terdaftar = 'sudah';
      else $data->terdaftar = 'belum';
    }
    echo json_encode($data);
  }

  function ganti_status_tender($id_tender,$id_status_tender){
    $data = $this->M_tender->ganti_status_tender($id_tender,$id_status_tender);
    if ($data) {
      if ($id_status_tender==1) {
        $this->session->set_flashdata('success', 'Tender telah diaktifkan!');
      }
      else {
        $this->session->set_flashdata('success', 'Tender telah dinonaktifkan!');
      }
    }
    else {
      $this->session->set_flashdata('error', 'Gagal mengubah status tender!');
    }
    redirect('Konsumen/Tender');
  }
}
