<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tender extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all_tender(){
    $this->db->limit(8);
    //$this->db->where('id_status_tender', 1);
    $this->db->order_by('tanggal_buka','DESC');
    return $this->db->get('tb_tender')->result();
  }

  function get_my_tender(){
    $this->db->join('tb_status_tender', 'tb_status_tender.id_status_tender = tb_tender.id_status_tender');
    $this->db->where('username_konsumen', $this->session->userdata('username'));
    $tender = $this->db->get('tb_tender')->result();
    $counter=0;
    foreach ($tender as $key) {
      $this->db->reset_query();
      $this->db->where('tb_lamaran.id_tender', $key->id_tender);
      $tender[$counter]->jumlah_pelamar = $this->db->get('tb_lamaran')->num_rows();
      $counter++;
    }
    return $tender;
  }

  function get_detail_tender(){
    $this->db->where('tb_tender.id_tender', $this->input->post('id_tender'));
    $tender = $this->db->get('tb_tender')->result();
    $this->db->reset_query();
    $this->db->where('tb_lamaran.id_tender', $this->input->post('id_tender'));
    $tender[0]->jumlah_pelamar = $this->db->get('tb_lamaran')->num_rows();
    return $tender[0];
  }

  function add_tender(){
    $data=array(
      'tittle' => $this->input->post('tittle'),
      'deskripsi' =>$this->input->post('deskripsi'),
      'deadline' => date('Y-m-d', strtotime($this->input->post('deadline'))),
      'tanggal_buka' => date('Y-m-d'),
      'tanggal_tutup' => date('Y-m-d', strtotime($this->input->post('tanggal_tutup'))),
      'id_status_tender' => 1,
      'username_konsumen' => $this->session->userdata('username')
    );
    $nama_file = time().$_FILES['gambar']['name'];

    $config['upload_path'] = './assets/image/tender/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
    $config['file_name'] = $nama_file;
    $this->load->library('upload',$config);

    if (!empty($_FILES['gambar']['name'])) {
      $data['gambar'] = $nama_file;
      if (!$this->upload->do_upload('gambar')){
        $result = array('error' => $this->upload->display_errors());
        return 'gagal';
      }
      else{
        $result = array('upload_data' => $this->upload->data());
      }
    }
    $this->db->insert('tb_tender', $data);
    return 'berhasil';
  }

  function ganti_status_tender($id_tender,$id_status_tender){
    $data = array(
      'id_status_tender' => $id_status_tender
    );
    $this->db->where('id_tender', $id_tender);
    return $this->db->update('tb_tender', $data);
  }


}
