<?php
class Find extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            $this->load->model('user_model');
    }
 
    public function index()
    {
        $this->load->view('find_user');   
    }
    // the URL segment holding the data becomes an argument to the method
    public function getuser()
    {
             $fname = $this->input->get('firstname'); 
             $lname = $this->input->get('lastname'); 
			 $dept = $this->input->get('dept'); 
			 $jobtitle = $this->input->get('jobtitle'); 
			 
             $user = $this->user_model->finduser($fname, $lname,$dept,$jobtitle);
             $data['user'] = $user;
		     $this->load->view('details',$data);
    }
}
 
        