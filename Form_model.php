<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model{
  
  
  public function add_user( $usersdata){


    $this->db->insert('form', $usersdata);

    
  }




  public function select()  
  {  
     //data is retrive from this query  
     $query = $this->db->get('form');  
     return $query;  
  } 
  
  }





?>




