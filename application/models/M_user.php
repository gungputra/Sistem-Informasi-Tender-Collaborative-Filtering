<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function login($username){
    $this->db->where('username',$username);
    $this->db->join('tb_role', 'tb_role.id_role = tb_user.id_role');
    return $this->db->get('tb_user')->row_array();
  }

}
