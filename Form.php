<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {


    public function __construct()
    {   parent::__construct(); 
        $this->load->helper('form');
        $this->load->library('form_validation');
    
    }    // constructor

	public function loader()
	{
    


// file uploading

$config['upload_path'] = './uploads/';
$config['allowed_types'] = 'gif|jpg|png';
$config['max_size'] = 5000;


$this->load->library('upload', $config);

if (!$this->upload->do_upload('pidproof')) {
}
else{
$fd =$this->upload->data();
$pidproof =$fd['file_name'];
}


if (!$this->upload->do_upload('adproof')) {
}
else{
$fd =$this->upload->data();
$adproof =$fd['file_name'];
}
if (!$this->upload->do_upload('image3')) {
}
else{
$fd =$this->upload->data();
$image3 =$fd['file_name'];
}
if (!$this->upload->do_upload('image4')) {
}
else{
$fd =$this->upload->data();
$image4 =$fd['file_name'];
}
if (!$this->upload->do_upload('image5')) {
}
else{
$fd =$this->upload->data();
$image5 =$fd['file_name'];
}
if (!$this->upload->do_upload('brproof')) {
}
else{
$fd =$this->upload->data();
$brproof =$fd['file_name'];
}

// form validation

$this->form_validation->set_rules('name', 'name', 'required');
$this->form_validation->set_rules('email', 'email', 'required');
$this->form_validation->set_rules('mobile', 'mobile','required');
$this->form_validation->set_rules('addressLine1', 'addressLine1','required');
$this->form_validation->set_rules('addressLine2', 'addressLine2','required');
$this->form_validation->set_rules('landmark', 'landmark','required');
$this->form_validation->set_rules('city', 'city','required');
$this->form_validation->set_rules('state', 'state','required');
$this->form_validation->set_rules('pincode', 'pincode','required');
$this->form_validation->set_rules('message', 'message','required');
$this->form_validation->set_rules('keytype', 'keytype','required');
$this->form_validation->set_rules('keys', 'keys','required');
$this->form_validation->set_rules('keyno', 'keyno','required');
$this->form_validation->set_rules('rkeyno', 'rkeyno','required');
$this->form_validation->set_rules('totaladditional_charge', 'totaladditional_charge','required');
$this->form_validation->set_rules('bankrefno', 'bankrefno');


        if ($this->form_validation->run() == FALSE){

            $this->load->view('form/form_view');
            
        }
		
        else{  
      $usersdata = array(
        'name' => $this->input->post('name'),
        'mobile' => $this->input->post('mobile'),
        'email' => $this->input->post('email'),
        'addressLine1' => $this->input->post('addressLine1'),
        'addressLine2' => $this->input->post('addressLine2'),
        'landmark' => $this->input->post('landmark'),
        'city' => $this->input->post('city'),
        'state' => $this->input->post('state'),
        'pincode' => $this->input->post('pincode'),
        'message' => $this->input->post('message'),
        'pidproof' => $pidproof,
        'brproof' => $brproof,
        'adproof' => $adproof,
        'image3' => $image3,
        'image4' => $image4,  
        'image5' => $image5, 
        'keytype' => $this->input->post('keytype'),
        'keys' => $this->input->post('keys'),
        'keyno' => $this->input->post('keyno'),
        'rkeyno' => $this->input->post('rkeyno'),
        'totaladditional_charge' => $this->input->post('totaladditional_charge'),
        'bankrefno' => $this->input->post('bankrefno'),

      
    );

    $this->load->model('form_model');
    $this->form_model->add_user($usersdata);   

    $this->session->set_flashdata('message', 'data added successfully.');

    redirect('form/loader');  }

    
	
	}






    public function view(){


        $this->load->model('form_model');  
        //load the method of model  
        $data['list']=$this->form_model->select();  
        //return the data in view  
        $this->load->view('form/database_view', $data);  

    }
}
