<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produsen extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_list_pelamar(){
    $this->db->join('tb_user', 'tb_user.username = tb_lamaran.username_produsen');
    $this->db->where('tb_lamaran.id_tender', $this->input->post('id_tender'));
    return $this->db->get('tb_lamaran')->result();
  }

  function lamar_tender(){
    $data=array(
      'id_tender' => $this->input->post('id_tender'),
      'username_produsen' =>$this->session->userdata('username'),
      'tawaran_harga' => $this->input->post('tawaran_harga'),
      'id_status_lamaran' => 3
    );
    $nama_file = time().$_FILES['rab']['name'];
    $nama_file = str_replace(' ','_',$nama_file);
    $config['upload_path'] = './assets/file/rab/';
    $config['allowed_types'] = 'pdf';
    $config['file_name'] = $nama_file;
    $this->load->library('upload',$config);

    if (!empty($_FILES['rab']['name'])) {
      $data['rab'] = $nama_file;
      if (!$this->upload->do_upload('rab')){
        //$result = array('error' => $this->upload->display_errors());
        return 0;
      }
      else{
        //$result = array('upload_data' => $this->upload->data());
        if ($this->db->insert('tb_lamaran', $data)) {
          return 1;
        }
      }
    }
  }

  function list_lamaran(){
    $username = $this->session->userdata('username');
    $this->db->join('tb_tender', 'tb_tender.id_tender = tb_lamaran.id_tender');
    $this->db->where('tb_lamaran.username_produsen', $username);
    return $this->db->get('tb_lamaran')->result();
  }

}
