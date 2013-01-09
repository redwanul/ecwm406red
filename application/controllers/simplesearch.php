<?php
class Simplesearch extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('simplesearch_model');//here the loading of the model is defined
	
		
    }
	public function index(){
        
    }


	function searchEmployee(){//here is the function 

		$limit =100;
		$emp_no = $this->input->get('emp_no');//here are the variables stated for the input posts
		$last_name = $this->input->get('last_name');//here are the variables stated for the input posts
		$title =$this->input->get('title');//here are the variables stated for the input posts
		$dept_no =$this->input->get('dept_no');
		
		$this->load->model('simplesearch_model');//here is the model being defined to be loaded
		
		if (empty($emp_no) && empty($last_name) && empty($title) && empty($dept_no)) {
			$data = ('');
		} else {
		$data['query'] = $this->simplesearch_model->searchEmployee($emp_no,$last_name,$title,$dept_no,$limit);//here are the variables defined for what are underneath the search 
		}
		$this->load->view('simplesearch', $data);//here is the load view again defined 
	}

}

