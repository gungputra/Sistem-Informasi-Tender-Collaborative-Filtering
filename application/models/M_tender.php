<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tender extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all_tender(){
    return $this->db->get('tb_tender')->result();
  }

}
